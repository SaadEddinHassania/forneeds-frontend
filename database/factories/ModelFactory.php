<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Chart::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Models\AcademicLevel::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Age::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Answer::class, function (Faker\Generator $faker) {
    return [
        'question_id' => function () {
            return factory(App\Models\Question::class)->create()->id;
        },
        'answer' => $faker->word,
        'order' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Disability::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Gender::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Location\Area::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
    ];
});

$factory->define(App\Models\Location\City::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'shape_id' => $faker->randomNumber(),
        'area_id' => function () {
            return factory(App\Models\Location\Area::class)->create()->id;
        },
        'location_meta_id' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Location\District::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'shape_id' => $faker->randomNumber(),
        'city_id' => function () {
            return factory(App\Models\Location\City::class)->create()->id;
        },
        'location_meta_id' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Location\LocationMeta::class, function (Faker\Generator $faker) {
    return [
        'population' => $faker->randomNumber(),
        'unemployment' => $faker->randomNumber(),
        'poverty_lvl' => $faker->randomNumber(),
        'model' => $faker->word,
    ];
});

$factory->define(App\Models\MarginalizedSituation::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
    ];
});

$factory->define(App\Models\MaritalStatus::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'sponsor' => $faker->word,
        'expires_at' => $faker->dateTimeBetween(),
        'starts_at' => $faker->dateTimeBetween(),
        'is_accepted' => $faker->boolean,
        'description' => $faker->text,
        'sector_id' => $faker->randomNumber(),
        'service_provider_id' => function () {
            return factory(App\Models\Users\ServiceProvider::class)->create()->id;
        },
        'area_id' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Question::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->text,
        'survey_id' => function () {
            return factory(App\Models\Survey::class)->create()->id;
        },
        'step' => $faker->randomNumber(),
        'order' => $faker->randomNumber(),
        'rule' => $faker->word,
    ];
});

$factory->define(App\Models\RefugeeState::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Sector::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\ServiceRequest::class, function (Faker\Generator $faker) {
    return [
        'citizen_id' => $faker->randomNumber(),
        'sector_id' => $faker->randomNumber(),
        'area_id' => $faker->randomNumber(),
        'images' => $faker->text,
        'state' => $faker->boolean,
        'service_type_id' => function () {
            return factory(App\Models\ServiceType::class)->create()->id;
        },
    ];
});

$factory->define(App\Models\ServiceType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'sector_id' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Survey::class, function (Faker\Generator $faker) {
    return [
        'subject' => $faker->word,
        'expires_at' => $faker->dateTimeBetween(),
        'starts_at' => $faker->dateTimeBetween(),
        'description' => $faker->text,
        'project_id' => $faker->randomNumber(),
        'questions_count' => $faker->word,
        'is_accepted' => $faker->boolean,
        'state' => $faker->boolean,
    ];
});

$factory->define(App\Models\Target::class, function (Faker\Generator $faker) {
    return [
        'project_id' => function () {
            return factory(App\Models\Project::class)->create()->id;
        },
        'targetable_id' => $faker->randomNumber(),
        'targetable_type' => $faker->word,
    ];
});

$factory->define(App\Models\Users\Beneficiary::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Users\Citizen::class, function (Faker\Generator $faker) {

    return [
        'mobile_number' => $faker->word,
        'user_id' => function () use ($faker) {
            return factory(App\User::class)->create()->id;
        },
        'marital_status_id' => $faker->numberBetween(1, 5),
        'age_id' => $faker->numberBetween(1, 5),
        'gender_id' => $faker->numberBetween(1, 2),
        'refugee_state_id' => $faker->numberBetween(1, 2),
        'working_state_id' => $faker->numberBetween(1, 5),
        'disability_id' => $faker->numberBetween(1, 5),
        'academic_level_id' => $faker->numberBetween(1, 5),
        'contactable' => $faker->boolean,
    ];
});

$factory->define(App\Models\Users\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Users\ServiceProvider::class, function (Faker\Generator $faker) {
    return [
        'mission_statement' => $faker->text,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'service_provider_type_id' => $faker->randomNumber(),
        'phone_number' => $faker->word,
        'mobile_number' => $faker->word,
        'fax' => $faker->word,
        'website' => $faker->word,
        'contact_person' => $faker->word,
        'contact_person_title' => $faker->word,
        'is_accepted' => $faker->boolean,
        'company_id' => function () {
            return factory(App\Models\Users\Company::class)->create()->id;
        },
    ];
});

$factory->define(App\Models\Users\ServiceProviderType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'sectors_id' => function () {
            return factory(App\Models\Sector::class)->create()->id;
        },
    ];
});

$factory->define(App\Models\Users\SocialWorker::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'age_id' => function () {
            return factory(App\Models\Age::class)->create()->id;
        },
        'gender_id' => function () {
            return factory(App\Models\Gender::class)->create()->id;
        },
        'area_id' => function () {
            return factory(App\Models\Location\Area::class)->create()->id;
        },
        'address' => $faker->word,
        'mobile' => $faker->word,
        'telephone' => $faker->word,
        'cv' => $faker->word,
        'is_accepted' => $faker->boolean,
    ];
});

$factory->define(App\Models\WorkField::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\WorkingState::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Payment::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\PaymentRequest::class, function (Faker\Generator $faker) {
    return [
    ];
});

