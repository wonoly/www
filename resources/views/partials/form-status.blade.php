@if (session('message'))
  <div class="alert absolute rounded bottom-10 right-10 bg-white text-black shadow-md z-50 p-5 w-max-30 fade show" role="alert">
    <div class="w-full h-full flex items-center">
      <a href="#" class="close text-base mr-5" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="flex items-center h-full">
        <p>{{ session('message') }}</p>
      </span>
    </div>
  </div>
@endif

@if (session('success'))
  <div class="alert absolute rounded bottom-10 right-10 bg-white text-black shadow-md z-50 p-5 w-max-30 fade show" role="alert">
    <div class="w-full h-full flex items-center">
      <a href="#" class="close text-base mr-2" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="flex items-center h-full">
        <h4 class="font-bold mr-2">Success</h4>
        <p>
          {{ session('success') }}
        </p>
      </span>
    </div>
  </div>
@endif

@if(session()->has('status'))
    @if(session()->get('status') == 'wrong')
      <div class="alert absolute rounded bottom-10 right-10 bg-white text-black shadow-md z-50 p-5 w-max-30 fade show" role="alert">
        <div class="w-full h-full flex items-center">
          <a href="#" class="close text-base" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="flex items-center h-full">
            <h4 class="font-bold mx-2">Alert</h4>
            <p>
              {{ session('message') }}
            </p>
          </span>
        </div>
      </div>
    @endif
@endif

@if (session('error'))
  <div class="alert absolute rounded bottom-10 right-10 bg-white text-black shadow-md z-50 p-5 w-max-30 fade show" role="alert">
    <div class="w-full h-full flex items-center">
      <a href="#" class="close text-base mr-5" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="flex items-center h-full">
        <h4 class="font-bold mx-2">Error</h4>
        <p>
          {{ session('error') }}
        </p>
      </span>
    </div>
  </div>
@endif

@if (session('errors') && count($errors) > 0)
  <div class="alert absolute rounded bottom-10 right-10 bg-white text-black shadow-md z-50 p-5 w-max-30 fade show" role="alert">
    <div class="w-full h-full flex items-center">
      <span class="flex h-full">
        <a href="#" class="close text-base" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="mx-2">
          <strong>{{ Lang::get('auth.whoops') }}</strong> {{ Lang::get('auth.someProblems') }}
          <br>
          <ul class="list-decimal">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </h4>
      </span>
    </div>
  </div>
@endif
