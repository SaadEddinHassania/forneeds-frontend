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
                'libs' => ([
                    'chartjs' => ['chartjs_line' => 'line', 'chartjs_area' => 'area', 'chartjs_bar' => 'bar', 'chartjs_pie' => 'pie', 'chartjs_donut' => 'donut'],
                    'highcharts' => ['highcharts_line' => 'line', 'highcharts_area' => 'area', 'highcharts_bar' => 'bar', 'highcharts_pie' => 'pie', 'highcharts_donut' => 'donut', 'highcharts_geo' => 'geo'],
                    'google' => ['google_line' => 'line', 'google_area' => 'area', 'google_bar' => 'bar', 'google_pie' => 'pie', 'google_donut' => 'donut', 'google_geo' => 'geo', 'google_gauge' => 'gauge'],
                    'chartist' => ['chartist_line' => 'line', 'chartist_area' => 'area', 'chartist_bar' => 'bar', 'chartist_pie' => 'pie', 'chartist_donut' => 'donut'],
                    'fusioncharts' => ['fusioncharts_line' => 'line', 'fusioncharts_area' => 'area', 'fusioncharts_bar' => 'bar', 'fusioncharts_pie' => 'pie', 'fusioncharts_donut' => 'donut'],
                    'plottablejs' => ['plottablejs_line' => 'line', 'plottablejs_area' => 'area', 'plottablejs_bar' => 'bar', 'plottablejs_pie' => 'pie', 'plottablejs_donut' => 'donut'],
                    'c3' => ['c3_line' => 'line', 'c3_area' => 'area', 'c3_bar' => 'bar', 'c3_pie' => 'pie', 'c3_donut' => 'donut', 'c3_gauge' => 'gauge']]),
                'multi_libs' => ([
                    'chartjs' => ['chartjs_line' => 'line', 'chartjs_area' => 'area', 'chartjs_bar' => 'bar'],
                    'highcharts' => ['highcharts_line' => 'line', 'highcharts_area' => 'area', 'highcharts_bar' => 'bar', 'highcharts_areaspline' => 'Areaspline'],
                    'google' => ['google_line' => 'line', 'google_area' => 'area', 'google_bar' => 'bar'],
                    'morris' => ['morris_line' => 'line', 'morris_area' => 'area', 'morris_bar' => 'bar'],
                    'chartist' => ['chartist_line' => 'line', 'chartist_area' => 'area', 'chartist_bar' => 'bar'],
                    'fusioncharts' => ['fusioncharts_line' => 'line', 'fusioncharts_area' => 'area', 'fusioncharts_bar' => 'bar'],
                    'plottablejs' => ['plottablejs_line' => 'line', 'plottablejs_area' => 'area', 'plottablejs_bar' => 'bar'],
                    'c3' => ['c3_line' => 'line', 'c3_area' => 'area', 'c3_bar' => 'bar']]),
                'ben' => new Citizen(),
                'target_types' => $targets,
                'target_types_m' => $targets_types_m
            ]);
    }

    public function render(Request $request)


    {//DB::enableQueryLog();
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
            $data = $data->mapWithKeys(function ($item) {
                return [$item['name'] => count($item['citizensCount'])];
            });
            $data = $data->toArray();
            $totals = array_values($data);
            $keys = array_keys($data);
        } else {
            $model = snake_case(class_basename($model));
            $data = Citizen::groupBy($model . '_id')->select($model . '_id', DB::raw('count(*) as total'))->get();
            //   dump(DB::getQueryLog(),$data);

            //    dd($data);
            $data = $data->mapWithKeys(function ($item) use ($target) {
                // dd((class_basename(((str_replace('-', '\\', $target))))));
                /***
                 * todo
                 * rename relations properly so that i can get the label of relation like a boss
                 */
                return [$item['total'] => $item[$target . '_id']];
            });

            $data = $data->toArray();
            $keys = array_values($data);
            $totals = array_keys($data);
        }


        $chart = Charts::create($theme[1], $theme[0])
            ->title('Beneficiaries according to ' . ucfirst($model))
            ->elementLabel("Citizens Count")
            ->labels($keys)
            ->values($totals)
            ->dimensions(1000, 500)
            ->responsive(false)->width(0)->height(300);
        if ($request->isXmlHttpRequest()) {
            return $chart->render();
        }
        return $this->output($chart);
    }

    public function multiRender(Request $request)
    {
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
            ->colors(['#ff0000', '#00ff00', '#0000ff','#c62828','#ad1457','#6a1b9a','#4527a0','#283593'])
            ->labels($labels);

        $modelsY = $target['y'];

        if (in_array($base, ['Area', 'Sector'])) {
        } else {
            $model = snake_case(class_basename($modelx));
            $dataset = [];
            dump($modelsY);

            foreach ($modelxObjects as $xObj) {
                foreach ($modelsY as $modelY) {
                    $val = explode('#', $modelY);

                    $attr_name = snake_case(class_basename($val[0]));
                    $data = Citizen::where($model . '_id', $xObj->id)->groupBy($attr_name . '_id')
                        ->select($attr_name . '_id', DB::raw('count(*) as total'))->get()
                        ->map(function($i){return $i->total?$i->total:0;})->toArray('total');
                    dump($modelY);
                    dump($data);

                    $dataset['title'] = ucwords(str_replace('_', ' ', $val[0]::find($val[1])->name));

                    $dataset['data'][] = emptyArray($data)?0:$data;
                    dump("====================");

                }
                dump($dataset);
                $chart->dataset($dataset['title'], $dataset['data']);

                $dataset=[];
            }

        }

        if ($request->isXmlHttpRequest()) {
            return $chart->render();
        }
        return $this->output($chart);
    }
}


