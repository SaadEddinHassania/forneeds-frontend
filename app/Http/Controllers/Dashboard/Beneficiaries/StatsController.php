<?php

namespace App\Http\Controllers\Dashboard\Beneficiaries;

use App\Models\Target;
use App\Models\Users\Citizen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use DB;

class StatsController extends Controller
{
    public function index()
    {

        $chart = Charts::create('line');

        return $this->output($chart);
    }

    private function output($chart, $multi = false)
    {
        $targets = (array_flip(collect(Target::$types)->map(function ($key, $val) {
            return str_replace('\\', '-', $key);
        })->forget(['gender', 'workfield'])->toArray()));;
        $targets_types_m = collect(Target::getMultTypes())->forget(['gender', 'workfield'])->toArray();
        return view('dashboard.beneficiaries.statistics',
            ['chart' => $chart,
                'libs' => config('charts.libs'),
                'multi_libs' => config('charts.multi_libs'),
                'ben' => new Citizen(),
                'target_types' => $targets,
                'target_types_m' => $targets_types_m
            ]);
    }

    public function render(Request $request)


    {
        DB::enableQueryLog();
        if ($request->has('multi')) {
            return $this->multiRender($request);
        }
        $theme = explode('_', $request->input('theme'));
        $target = $request->input('attr_list');
        $model = ((str_replace('-', '\\', $target)));
        $base = class_basename($model);
        if (in_array($base, ['Area', 'Sector'])) {
            //$model=str_plural(strtolower($base));
            $modelObj = new $model();
            $data = $model::with('citizensCount')->get();

            //dump(DB::getQueryLog(),$data[0]['citizensCount']);

            $data = $data->mapWithKeys(function ($item) {
                return [$item['name'] => count($item['citizensCount'])];
            });

            $data = $data->toArray();
            $totals = array_values($data);
            $keys = array_keys($data);
        } else {
            //$model = snake_case(class_basename($model));
            // dd($model);
            $keys = [];
            $totals = [];
            $data = $model::with(['citizensCount' => function ($data) use (&$keys, &$totals) {
                $data->each(function ($v) use (&$keys, &$totals) {
                    //    dump($v);
                    $totals[$v->age_id] = ($v->aggregate);

                });
                return $data;
            }])->get();
            $keys = $data->mapWithKeys(function ($v) {
                return [$v->name];
            })->toArray();

            //    dd($data);

            //dump($keys, $totals);
            //   dump(DB::getQueryLog());


        }


        $chart = Charts::create($theme[1], $theme[0])
            ->title('Beneficiaries according to ' . ucfirst($model))
            ->elementLabel("Citizens Count")
            ->labels(array_values($keys))
            ->values(array_values($totals))
            ->dimensions(1000, 500)
            ->responsive(false)->width(0)->height(300);
        if ($request->isXmlHttpRequest()) {
            return $chart->render();
        }
        return $this->output($chart);
    }

    public function multiRender(Request $request)
    {
        DB::enableQueryLog();

        $theme = explode('_', $request->input('theme'));
        $target = $request->input('attr_list');

        $modelx = ((str_replace('-', '\\', $target['x'])));
        $modelxObjects = $modelx::select('id', 'name')->get();
        $labels = $modelxObjects->map(function ($label) {
            return $label['name'];
        })->toArray();

        //   dd($labels);

        $base = class_basename($modelx);


        $chart = Charts::multi($theme[1], $theme[0])
            ->responsive(false)
            ->dimensions(0, 300)
            ->colors(['#ff0000', '#00ff00', '#0000ff', '#c62828', '#ad1457', '#6a1b9a', '#4527a0', '#283593'])
            ->labels($labels);

        $modelsY = $target['y'];
        $model = snake_case(class_basename($modelx));
        $dataset = [];
        $elemnt_label = [];
        // dump($modelsY);

        foreach ($modelsY as $modelY) {
            $val = explode('#', $modelY);
            $model_y_attr_val = ucwords(str_replace('_', ' ', $val[0]::find($val[1])->name));
            $elemnt_label[] = $model_y_attr_val;
            $attr_name = snake_case(class_basename($val[0]));
            if (in_array($attr_name, ['area', 'sector'])) {
                $data = $val[0]::with(['citizensCount' => function ($builder) use ($model, $attr_name) {
                    dump($builder->
                    groupBy([$model . '_id'])
                        ->select($model . '_id', DB::raw('count(' . $model . '_id' . ') as total'))
                        ->orderBy($model . '_id')
                        ->get());
                }])->get();
            } else {
                $data = Citizen::where($attr_name . '_id', $val[1])->groupBy([$model . '_id', $attr_name . '_id'])
                    ->select(DB::raw('count(' . $model . '_id' . ') as total'))->get()
                    ->map(function ($i) {
                        return $i->total;
                    })->toArray('total');
            }


            $dataset['title'] = $model_y_attr_val;

            $dataset['data'] = $data;
            //  dump(DB::getQueryLog(), $data, $dataset);
            $chart->dataset($dataset['title'], $dataset['data']);

            $dataset = [];
        }


        $elemnt_label = implode(' ', $elemnt_label);
        $chart->title('Beneficiaries according to ' . str_replace('_', ' ', ucfirst($model)));
        $chart->elementLabel("Count({$elemnt_label})");


        if ($request->isXmlHttpRequest()) {
            return $chart->render();
        }
        return $this->output($chart);
    }
}


