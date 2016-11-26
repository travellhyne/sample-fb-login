<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Message</div>

                    <div class="panel-body">
                        Something will happen after five minutes. Check your email.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import 'whatwg-fetch';
    export default {
        props: ['user'],
        mounted() {
            console.log('Component ready.');

            setTimeout(() => {
                fetch('/alert/' + this.user, {
                    headers: {
                        'X-CSRF-Token': window.Laravel.csrfToken
                    }
                }).then(response => response.json())
                .then(json => console.log(json));
            }, 1000 * 60 * 5); // 5 minutes
        }
    }
</script>
