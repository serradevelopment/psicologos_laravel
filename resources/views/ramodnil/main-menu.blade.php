@php
$routeArray = app('request')->route()->getAction();
$controllerAction = class_basename($routeArray['controller']);
list($controller, $action) = explode('@', $controllerAction);
@endphp

@php
$class = '';

if ($controller == 'HomeController') {
$class = 'active';
}
@endphp
<svg style="position:absolute;transform:scaleY(-1);top:0;z-index:-1;" class="custom-svg-style-1" viewBox="0 0 180 470" x="0px" y="0px" width="100%" height="100%">
    <g>
        <path id="shape_one_start" opacity="0.098" fill="#00a3d5" d="M 847.5703 23.7939 C 847.5703 23.7939 581.8154 -245.1675 394.2842 33.9375 C 305.4043 166.2183 345.0537 358.8125 253.5615 364.6631 C 162.0684 370.5146 129.5303 342.542 70.9883 383.9072 C 3.0254 431.9297 17.8926 499.2158 17.8926 499.2158 L 847.5703 499.2158 L 847.5703 23.7939 Z" />
        <path id="shape_one_end" opacity="0.098" fill="#00a3d5" d="m847.5703,24.7939c0,0 -85.7549,-346.9614 -273.2861,-67.8564c149.1201,176.2808 52.7695,313.875 -46.7227,312.7256c-99.4922,-1.1494 -59.0312,107.8789 -117.5732,149.2441c-67.9629,48.0225 -186.0957,167.3086 -207.0957,167.3086l644.6777,-86l0,-475.4219z" style="visibility:hidden" />

        <path id="shape_two_start" opacity="0.149" fill="#00a3d5" d="M 847.5703 239.9771 C 847.5703 239.9771 806.873 141.5913 733.1348 164.937 C 622.249 200.0459 648.416 318.083 566.6426 342.042 C 484.8682 365.999 247.9814 345.0283 168.6406 371.8037 C 89.3008 398.5781 85.5703 499.3408 85.5703 499.3408 L 847.5693 499.3408 L 847.5703 239.9771 Z" /> 
        <path id="shape_two_end" opacity="0.149" fill="#00a3d5" d="m907.5703,89.9771c0,0 29.3027,-9.3858 -95.4355,112.9599c-124.7382,122.3457 -254.7188,64.146 -300.4922,167.105c-45.7734,102.959 -79.6612,61.9863 -209.002,106.7617c-129.3408,44.7754 -218.0703,21.5371 -218.0703,21.5371l761.999,0l0.001,-265.3637z" style="visibility:hidden" /> 								
    </g>
</svg>
<li class="nav-item {{ $class }}">
    <a href="{{ route('home') }}" class="nav-link ">
        <i class="fas fa-home"></i>
        <p>Início</p>
    </a>
</li>

@php
$class = 'collapsed';

if ($controller == 'RatingsController') {
$class = 'active show';
}
@endphp   
<li class="nav-item {{ $class }}">
    <a href="{{ route('ratings.index') }}" class="nav-link ">
        <i class="fas fa-star"></i>
        <p>Avaliações</p>
    </a>
</li>
<li class="nav-item ">
    <a href="https://chat.whatsapp.com/DtIhEprrTzn8FGsDXBUrpc" target="_blank" class="nav-link ">
        <i class="fab fa-whatsapp-square"></i>
        <p>Grupo Whatsapp</p>
    </a>
</li>
<li class="nav-item ">
    <a href="http://www.ccs.saude.gov.br/saudemental/capsriodejaneiro.php" target="_blank" class="nav-link ">
        <i class="fas fa-info-circle"></i>
        <p>Lista de CAPS</p>
    </a>
</li>
@php
$class = 'collapsed';

if ($controller == 'UsersController') {
$class = 'active show';
}
@endphp
<li class="nav-item {{ $class }} ">
    <a data-toggle="collapse" href="#submenu">
        <i class="nav-icon fa fa-cog"></i>
        <p>Configurações</p>
        <span class="caret"></span>
    </a>
    <div class="{{ $class }} collapse collapsed " id="submenu">
        <ul class="nav nav-collapse">

         @can('index', \App\User::class)    
         @php
         $class = '';

         if ($controller == 'UsersController' && $action <> 'profile')
         {
             $class = 'active';
         }
         @endphp
         <li class="{{ $class }}">
            <a href="{{ route('users.index') }}">
                <p class="sub-item">Usuários</p>
            </a>
        </li>

        @endcan

        @php
        $class = '';

        if ($controller == 'UsersController' && $action == 'profile') 
        {
            $class = 'active';
        }
        @endphp
        <li class="{{ $class }}">
            <a href="{{ route('users.profile') }}">
                <p class="sub-item">Perfil</p>
            </a>
        </li>
    </ul>
</div>
</li>

</ul>
</li>
