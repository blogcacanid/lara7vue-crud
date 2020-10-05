<template>
    <div class="page">
        <!-- navbar -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <router-link :to="{ name: 'home' }" class="navbar-brand">CRUD | Laravel 7 Vue Pagination</router-link>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name:'home' }">
                            Home
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name:'pegawai-list' }">
                            Pegawai
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- content -->
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>