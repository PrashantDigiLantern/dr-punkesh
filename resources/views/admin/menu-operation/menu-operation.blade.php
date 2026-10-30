

  <div class="col s4 m4 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <form class="login-form" method="POST" action="{{ url('orglist') }}">
      @csrf
      <div class="row">
        <div class="input-field col s12 text-centre">
          <h5 class="ml-4">{{ __('Manage Menu Operation') }}</h5>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <a href="{{url('menu-operation')}}" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">
            Manage Menu Operation
          </a>
        </div>
      </div>
    
    </form>
  </div>


