<li class="menu-title">Apparence</li>

{{-- <li>
    <a href="javascript: void(0);"><i class="mdi mdi-briefcase-check"></i><span>UI Elements</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="ui-alerts.html">Alerts</a></li>
        <li><a href="ui-buttons.html">Buttons</a></li>
        <li><a href="ui-cards.html">Cards</a></li>
        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
        <li><a href="ui-modals.html">Modals</a></li>
        <li><a href="ui-typography.html">Typography</a></li>
        <li><a href="ui-progress.html">Progress</a></li>
        <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
        <li><a href="ui-tooltips-popovers.html">Tooltips & Popover</a></li>
        <li><a href="ui-carousel.html">Carousel</a></li>
        <li><a href="ui-pagination.html">Pagination</a></li>
        <li><a href="ui-video.html">Videos</a></li>
        <li><a href="ui-colors.html">Colors</a></li>
        <li><a href="ui-grid.html">Grid System</a></li>
        <li><a href="ui-spinners.html">Spinners</a></li>
        <li><a href="ui-toasts.html">Toasts</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);"><i class="mdi mdi-buffer"></i><span>Advanced UI</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="advanced-rangeslider.html">Range Slider</a></li>
        <li><a href="advanced-sweetalerts.html">Sweet Alerts</a></li>
        <li><a href="advanced-nestable.html">Nestable List</a></li>
        <li><a href="advanced-ratings.html">Ratings</a></li>
        <li><a href="advanced-highlight.html">Highlight</a></li>
        <li><a href="advanced-clipboard.html">Clipboard</a></li>
        <li><a href="advanced-lightbox.html">Lightbox</a></li>
        <li><a href="advanced-session.html">Session Timeout</a></li>
        <li><a href="advanced-scrollbars.html">Scrollbars</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);"><i class="mdi mdi-clipboard-outline"></i><span class="badge badge-info float-right">8</span><span>Forms</span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="forms-elements.html">Basic Elements</a></li>
        <li><a href="forms-advanced.html">Advance Elements</a></li>
        <li><a href="forms-validation.html">Validation</a></li>
        <li><a href="forms-wizard.html">Wizard</a></li>
        <li><a href="forms-editors.html">Editors</a></li>
        <li><a href="forms-repeater.html">Repeater</a></li>
        <li><a href="forms-x-editable.html">X Editable</a></li>
        <li><a href="forms-uploads.html">File Upload</a></li>
    </ul>
</li> --}}

<li>
    <a href="javascript: void(0);"><i class="fas fa-user-friends"></i></i><span>Team</span><span class="menu-arrow"><i class="mdi mdi-chevron-right "></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('team.list') }}">Liste</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);"><i class="fas fa-desktop"></i> </i><span>Démos</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('demos.list') }}">Liste</a></li>
        <li><a href="{{ route('demo.add')  }}"></i>Ajouter</a></li>
        {{-- <li><a href="tables-responsive.html">Responsive</a></li>
        <li><a href="tables-editable.html">Editable</a></li> --}}
    </ul>
</li>

<li>
    <a href="javascript: void(0);"><i class="fas fa-feather-alt"></i> <span>Avis</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('testimonies.list') }}">Page d'accueil</a></li>
        <li><a href="{{ route('testimonies.clients.list') }}">Clients</a></li>
        {{-- <li><a href="{{ route('testimony.add') }}">Ajouter</a></li> --}}
    </ul>
</li>
