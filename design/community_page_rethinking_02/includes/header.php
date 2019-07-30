  <div>
<header>
  <div _ngcontent-c6="" class="container">
    <a class="navbar-brand my-2" routerlink="/home" ng-reflect-router-link="/home" href="/home">
      <img src="./images/dspace-logo.svg">
    </a>
    <nav _ngcontent-c6="" class="navbar navbar-light navbar-expand-md float-right px-0">
      <a _ngcontent-c6="" class="px-1" routerlink="/search" ng-reflect-router-link="/search" href="/search"><i _ngcontent-c6="" class="fas fa-search fa-lg fa-fw" title="Search"></i></a>
      <ds-lang-switch _ngcontent-c6="" _nghost-c9="">
        <!--bindings={
      "ng-reflect-ng-if": "true"
    }-->
        <div _ngcontent-c9="" class="navbar-nav ng-star-inserted dropdown" ngbdropdown="" style="">
          <a _ngcontent-c9="" aria-haspopup="true" class="px-1 dropdown-togglex" data-toggle="dropdown" href="#" id="dropdownLang" ngbdropdowntoggle="" role="button" aria-expanded="false">
            <i _ngcontent-c9="" class="fas fa-globe-asia fa-lg fa-fw" title="Language switch"></i>
          </a>
          <ul _ngcontent-c9="" aria-labelledby="dropdownLang" class="dropdown-menu" ngbdropdownmenu="" x-placement="bottom-left" style="top: 24px; left: 0px;">
            <!--bindings={
        "ng-reflect-ng-for-of": "en,de,cs"
      }-->
            <li _ngcontent-c9="" class="dropdown-item active ng-star-inserted"> English </li>
            <li _ngcontent-c9="" class="dropdown-item ng-star-inserted"> Deutsch </li>
            <li _ngcontent-c9="" class="dropdown-item ng-star-inserted"> Čeština </li>
          </ul>
        </div>
      </ds-lang-switch>
      <ds-auth-nav-menu _ngcontent-c6="" _nghost-c10="" class="ng-tns-c10-3">
        <ul _ngcontent-c10="" class="navbar-nav" ng-reflect-klass="navbar-nav" ng-reflect-ng-class="[object Object]">
          <li _ngcontent-c10="" class="nav-item ng-tns-c10-3 ng-star-inserted" style="">
            <div _ngcontent-c10="" class="d-inline-block dropdown ng-trigger ng-trigger-fadeInOut" ngbdropdown="" placement="bottom-right" ng-reflect-placement="bottom-right" style="">
              <a _ngcontent-c10="" class="px-1 dropdown-toggle" aria-haspopup="true" href="#" id="dropdownLogin" ngbdropdowntoggle="" aria-expanded="false">Log In</a>
              <div _ngcontent-c10="" class="ng-tns-c10-3 dropdown-menu" aria-labelledby="dropdownLogin" id="loginDropdownMenu" ngbdropdownmenu="" ng-reflect-ng-class="[object Object]" x-placement="bottom-right">
                <ds-log-in _ngcontent-c10="" class="ng-tns-c10-3 ng-tns-c11-4" _nghost-c11="">
                  <form _ngcontent-c11="" class="form-login px-4 py-3 ng-tns-c11-4 ng-star-inserted ng-dirty ng-touched ng-valid" novalidate="" ng-reflect-form="[object Object]" style="">
                    <label _ngcontent-c11="" class="sr-only" for="inputEmail">Email address</label>
                    <input _ngcontent-c11="" class="form-control form-control-lg position-relative ng-dirty ng-valid ng-touched" autocomplete="off" autofocus="" formcontrolname="email" id="inputEmail" required="" type="email" ng-reflect-required="" ng-reflect-name="email" placeholder="Email address">
                    <label _ngcontent-c11="" class="sr-only" for="inputPassword">Password</label>
                    <input _ngcontent-c11="" class="form-control form-control-lg position-relative mb-3 ng-dirty ng-valid ng-touched" autocomplete="off" formcontrolname="password" id="inputPassword" required="" type="password" ng-reflect-required="" ng-reflect-name="password" placeholder="Password">
                    <button _ngcontent-c11="" class="btn btn-lg btn-primary btn-block mt-3" type="submit">Log in</button>
                    <div _ngcontent-c11="" class="dropdown-divider"></div>
                    <a _ngcontent-c11="" class="dropdown-item" href="#">New user? Click here to register.</a>
                    <a _ngcontent-c11="" class="dropdown-item" href="#">Have you forgotten your password?</a>
                  </form>
                </ds-log-in>
              </div>
            </div>
          </li>
        </ul>
      </ds-auth-nav-menu>
      <div _ngcontent-c6="" class="pl-2">
        <button _ngcontent-c6="" aria-controls="collapsingNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" type="button">
          <span _ngcontent-c6="" aria-hidden="true" class="navbar-toggler-icon fas fa-bars fa-fw"></span>
        </button>
      </div>
    </nav>
  </div>
</header>
<ds-navbar _ngcontent-c2="" _nghost-c7="" class="ng-tns-c7-2">
  <nav _ngcontent-c7="" class="navbar navbar-light navbar-expand-md p-md-0 navbar-container ng-trigger ng-trigger-slideMobileNav" ng-reflect-klass="navbar navbar-light navbar-exp" ng-reflect-ng-class="[object Object]" style="">
    <div _ngcontent-c7="" class="container">
      <div _ngcontent-c7="" class="reset-padding-md w-100">
        <div _ngcontent-c7="" class="ng-tns-c7-2" id="collapsingNav">
          <ul _ngcontent-c7="" class="navbar-nav mr-auto shadow-none">
            <!--bindings={
      "ng-reflect-ng-for-of": "[object Object],[object Object"
    }-->
            <!---->
            <!--bindings={
    "ng-reflect-ng-component-outlet": "function ExpandableNavbarSecti",
    "ng-reflect-ng-component-outlet-injector": "StaticInjector[Injector, Injec"
  }-->
            <ds-expandable-navbar-section _nghost-c13="" class="ng-tns-c13-5 ng-star-inserted" style="">
              <li _ngcontent-c13="" class="nav-item dropdown">
                <a _ngcontent-c13="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="browseDropdown" routerlinkactive="active" ng-reflect-router-link-active="active">
                  <ds-text-menu-item class="ng-star-inserted"><span>All of DSpace</span></ds-text-menu-item>
                </a>
                <!--bindings={
      "ng-reflect-ng-if": "false"
    }-->
              </li>
            </ds-expandable-navbar-section>
            <!---->
            <!--bindings={
"ng-reflect-ng-component-outlet": "function NavbarSectionComponen",
"ng-reflect-ng-component-outlet-injector": "StaticInjector[Injector, Injec"
}-->
            <ds-navbar-section _nghost-c14="" class="ng-star-inserted" style="">
              <li _ngcontent-c14="" class="nav-item">
                <!--bindings={
  "ng-reflect-ng-component-outlet": "function LinkMenuItemComponent",
  "ng-reflect-ng-component-outlet-injector": "StaticInjector[Injector, Injec"
}-->
                <ds-link-menu-item class="ng-star-inserted"><a class="nav-item nav-link disabled" ng-reflect-klass="nav-item nav-link" ng-reflect-ng-class="[object Object]" href="/communities/9d00e890-e5ec-4f3c-ad7a-25d2f83bd01b">Statistics</a>
                </ds-link-menu-item>
              </li>
            </ds-navbar-section>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</ds-navbar>
</div>