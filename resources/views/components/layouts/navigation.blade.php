<header>

    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">

            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 35 35"
            role="img">
                <title>CRUD</title>
                <path d="M9.349 13.609h-1.261l-0.687 3.531h1.12c0.739 0 1.291-0.14 1.656-0.421 0.359-0.276 0.604-0.745 0.729-1.396 0.124-0.625 0.067-1.068-0.161-1.328-0.235-0.255-0.699-0.385-1.396-0.385zM16 7.584c-8.839 0-16 3.771-16 8.416s7.161 8.416 16 8.416c8.839 0 16-3.771 16-8.416s-7.161-8.416-16-8.416zM11.651 17.521c-0.344 0.333-0.765 0.583-1.219 0.733-0.448 0.141-1.020 0.219-1.713 0.219h-1.579l-0.432 2.24h-1.839l1.641-8.432h3.531c1.063 0 1.839 0.276 2.328 0.833 0.485 0.557 0.636 1.339 0.437 2.339-0.072 0.396-0.213 0.776-0.405 1.131-0.193 0.337-0.437 0.651-0.751 0.937zM17.021 18.473l0.724-3.733c0.083-0.423 0.052-0.713-0.095-0.871-0.14-0.151-0.448-0.229-0.916-0.229h-1.453l-0.937 4.833h-1.828l1.64-8.437h1.823l-0.437 2.245h1.625c1.027 0 1.729 0.177 2.115 0.531 0.391 0.36 0.505 0.937 0.355 1.735l-0.767 3.927zM27.145 15.453c-0.072 0.396-0.208 0.776-0.405 1.131-0.188 0.337-0.437 0.651-0.745 0.937-0.349 0.328-0.765 0.583-1.224 0.733-0.448 0.141-1.021 0.219-1.713 0.219h-1.573l-0.437 2.24h-1.839l1.641-8.432h3.531c1.063 0 1.839 0.276 2.328 0.839 0.485 0.552 0.636 1.333 0.437 2.333zM23.688 13.609h-1.256l-0.687 3.531h1.115c0.744 0 1.296-0.14 1.656-0.421 0.364-0.276 0.609-0.745 0.735-1.396 0.124-0.625 0.067-1.068-0.168-1.328-0.228-0.255-0.697-0.385-1.395-0.385z"
                fill="currentColor"></path>
              </svg>

            <span class="fs-4"> CRUD & API</span>
        </a>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/">Usuarios</a>
        </nav>
    </div>

    @if (isset($header) || isset($header_description))

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            @if (isset($header))
                <h1 class="display-4 fw-normal text-body-emphasis">{{ $header }}</h1>
            @endif

            @if (isset($header_description))
                <p class="fs-5 text-body-secondary">{{ $header_description }}</p>
            @endif
        </div>

    @endif

</header>
