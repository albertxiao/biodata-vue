<template>
    <div>
        
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0069c0;">
              <a class="navbar-brand text-white" href="#">Biodata</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                  <li class="nav-item">
                    <router-link to="/hey" class="nav-link text-white" href="#">Data Biodata</router-link>
                  </li>

                </ul>
              </div>
            </nav>

            <div class="container-fluid">             
                <router-view></router-view>
            </div>

    </div>
</template>

<script>
    export default{
        name: 'App'
    }
</script>