{{--<li class="{!! Request::is('admin/dashboard*') ? 'active' : '' !!}">--}}
    {{--<a href="{!! url('/admin/dashboard') !!}" class="nav-link nav-toggle">--}}
        {{--<i class="icon-home"></i>--}}
        {{--<span class="title">Dashboard</span>--}}
    {{--</a>--}}
{{--</li>--}}

<li class="{!! Request::is('admin/users*') ? 'active' : '' !!}">
    <a class="nav-link nav-toggle" href="{!! route('admin.users.index') !!}">
    <i class="fa fa-edit"></i>
    <span  class="title">Users</span></a>
</li>

{{--<li class="{!! Request::is('admin/sectors*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.sectors.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Sectors</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/serviceTypes*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.serviceTypes.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">ServiceTypes</span></a>--}}
{{--</li>--}}

<li class="{!! Request::is('admin/serviceProviders*') ? 'active' : '' !!}">
    <a class="nav-link nav-toggle" href="{!! route('admin.serviceProviders.index') !!}">
    <i class="fa fa-edit"></i>
    <span  class="title">ServiceProviders</span></a>
</li>

{{--<li class="{!! Request::is('companies*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.companies.index') !!}">--}}
        {{--<i class="fa fa-edit"></i>--}}
        {{--<span  class="title">Companies</span></a>--}}
{{--</li>--}}


{{--<li class="{!! Request::is('beneficiaries*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.beneficiaries.index') !!}">--}}
        {{--<i class="fa fa-edit"></i>--}}
        {{--<span  class="title">Beneficiaries</span></a>--}}
{{--</li>--}}


{{--<li class="{!! Request::is('admin/serviceProviderTypes*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.serviceProviderTypes.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">ServiceProviderTypes</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/locationMetas*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.locationMetas.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">LocationMetas</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/areas*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.areas.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Areas</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/cities*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.cities.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Cities</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/districts*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.districts.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Districts</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/streets*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.streets.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Streets</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/services*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.services.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Services</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/marginalizedSituations*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.marginalizedSituations.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">MarginalizedSituations</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/projects*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.projects.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Projects</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/surveyMetas*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.surveyMetas.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">SurveyMetas</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/surveys*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.surveys.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Surveys</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/questions*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.questions.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Questions</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/answers*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.answers.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Answers</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/services*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.services.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">Services</span></a>--}}
{{--</li>--}}

{{--<li class="{!! Request::is('admin/serviceRequests*') ? 'active' : '' !!}">--}}
    {{--<a class="nav-link nav-toggle" href="{!! route('admin.serviceRequests.index') !!}">--}}
    {{--<i class="fa fa-edit"></i>--}}
    {{--<span  class="title">ServiceRequests</span></a>--}}
{{--</li>--}}

