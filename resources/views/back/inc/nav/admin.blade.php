<li class="menu-title">Admin</li>
<li>
    <a href="javascript: void(0);"><i class="fas fa-users"></i><span>Notifications</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('admin.notifications.list') }}">Liste</a></li>
        <li><a href="{{ route('admin.clients.notification') }}">Créer</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);"><i class="fas fa-ticket-alt"></i><span>Tickets</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('admin.tickets.list') }}">Liste</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);"><i class="fas fa-users"></i><span>Utilisateurs</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('clients.list') }}">Clients</a></li>
        <li><a href="{{ route('users.list') }}">Staff</a></li>
        <li><a href="{{ route('user.add') }}">Ajouter</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);"><i class="fas fa-hands-helping"></i><span>Garanties</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('packages.list') }}">Liste</a></li>
        <li><a href="{{ route('package.add') }}">Ajouter</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);"><i class="fas fa-shopping-cart"></i><span>Produits</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('products.list') }}">Liste</a></li>
        <li><a href="{{ route('product.add') }}">Ajouter</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);"><i class="fas fa-shopping-bag"></i><span>Applications</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('applications.list') }}">Liste</a></li>
        <li><a href="{{ route('application.add') }}">Ajouter</a></li>
    </ul>
</li>

<li>
    <a href="{{ route('informations.edit') }}"><i class="fas fa-info"></i><span>Informations</span></a>
</li>
