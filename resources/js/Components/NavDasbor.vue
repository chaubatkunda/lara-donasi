<template>
    <div
        class="nav-dasbor d-flex flex-column flex-shrink-0 p-3 bg-light overflow-auto vh-100"
    >
        <Link
            :href="route('home')"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none"
        >
            <span class="fs-4">Lara'Donasi</span>
        </Link>
        <hr />
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <NavLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                    aria-current="page"
                >
                    Dashboard
                </NavLink>
            </li>
            <li>
                <NavLink
                    :href="route('campaign.index')"
                    :active="route().current('campaign*')"
                    >Campaign
                </NavLink>
            </li>

            <li>
                <NavLink
                    :href="route('donatur.index')"
                    :active="route().current('donatur*')"
                    >Donatur
                </NavLink>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">Laporan Campaign</a>
            </li>
        </ul>
        <hr />
        <div class="dropdown">
            <a
                href="#"
                class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                id="dropdownUser2"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <!-- <img
                    src="https://github.com/mdo.png"
                    alt=""
                    width="32"
                    height="32"
                    class="rounded-circle me-2"
                /> -->
                <strong>{{ $page.props.auth.user.name }}</strong>
            </a>
            <ul
                class="dropdown-menu text-small shadow"
                aria-labelledby="dropdownUser2"
            >
                <li>
                    <a class="dropdown-item" href="#">New Campaign</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Profile</a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <Link
                        class="dropdown-item"
                        :href="route('logout')"
                        method="post"
                        as="button"
                        >Sign out
                    </Link>
                </li>
            </ul>
        </div>
    </div>

    <!-- <div class="d-md-none d-sm-block">
        <button
            class="navbar-toggler bg-secondary"
            data-bs-toggle="offcanvas"
            href="#offcanvasExample"
            role="button"
            aria-controls="offcanvasExample"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <h6>Lara'Donasi</h6>
        <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel"
        >
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                    Offcanvas
                </h5>
                <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                ></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    Some text as placeholder. In real life you can have the
                    elements you have chosen. Like, text, images, lists, etc.
                </div>
                <div class="dropdown mt-3">
                    <button
                        class="btn btn-secondary dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton"
                        data-bs-toggle="dropdown"
                    >
                        Dropdown button
                    </button>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButton"
                    >
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                                >Something else here</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
</template>
<script>
import NavLink from "@/Components/NavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "NavDasbor",
    components: {
        NavLink,
        Link,
    },
};
</script>
