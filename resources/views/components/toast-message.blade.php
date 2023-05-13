@if (session()->has('message'))

<div class="toast toast-top toast-center w-80 z-50">

  <div class="alert alert-success shadow-lg" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
    x-show="show">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span>
        {!!session('message')!!}
      </span>
    </div>
  </div>
</div>

</div>

@endif
@if (session()->has('alert'))

<div class="toast toast-top toast-center w-80 z-50">

  <div class="alert alert-warning shadow-lg" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
    x-show="show">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span>
        {!!session('alert.message')!!}
      </span>
    </div>
  </div>
@endif
