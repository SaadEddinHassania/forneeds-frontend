

<div class="btn-group">
    <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Actions
        <i class="fa fa-angle-down"></i>
    </button>
    <ul class="dropdown-menu pull-right" role="menu">
        <li>
            <a href="{{route($modelRoute.'.message',$id)}}">
                <i class="fa fa-commenting-o" aria-hidden="true"></i> Send Message</a>
        </li>
        <li>
            <a href="{{route($modelRoute.'.payment',$id)}}">
                <i class="fa fa-money" aria-hidden="true"></i> Payment</a>
        </li>
    </ul>
</div>
