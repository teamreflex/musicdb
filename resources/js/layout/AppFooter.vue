<template>
    <footer class="footer has-cards">
        <div class="container">

            <div class="row align-items-center justify-content-md-between">
                <div class="col-md-6">
                    <div class="copyright">
                        &copy; {{year}}
                        <a href="https://github.com/teamreflex" target="_blank" rel="noopener">Reflex</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-footer justify-content-end">
                        <li class="nav-item">
                            <a href="https://twitter.com/Kairuxo" class="nav-link" target="_blank" rel="noopener">@Kairuxo</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/teamreflex/musicdb/blob/master/LICENSE.md"
                               class="nav-link" target="_blank" rel="noopener">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
  name: 'app-footer',
  data() {
    return {
      year: new Date().getFullYear()
    }
  }
};
</script>
<style>
</style>
