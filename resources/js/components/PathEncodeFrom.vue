<template>
    <div class="container">
        <div class="row my-4">
            <input class="col-sm-4 col-xs-12" type="text" v-model="url" placeholder="https://anydomain.com/document" maxlength="255"/>
            <input class="col-sm-2 col-xs-12" type="button" @click="encode()" :disabled="process" value="Encode"/>
        </div>
        <div class="row">
            <div class="col-xl-12" v-if="result.url">
                <p>Full link: {{ result.url }}</p>
                <p>Short link: <input type="text" readonly="readonly" :value="shortUrl" class="col-xs-12 col-sm-3"/></p>
            </div>
            <div class="text-danger col-xl-12" v-if="error" v-html="error"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                url: null,
                process: false,
                result: {},
                error: null
            };
        },
        mounted() {

        },
        computed: {
            shortUrl() {
                return window.location.origin + '/' + (this.result.slug || '');
            },
        },
        methods: {
            encode() {
                if (!this.url) {
                    return;
                }
                this.process = true;
                axios
                    .post('/encodepath', {
                        url: this.url,
                    })
                    .then((response) => {
                        this.result = response.data;
                        this.error = null;
                    })
                    .catch((error) => {
                        if (error.response) {
                            this.error = error.response.data.message;
                            for (let errorName in error.response.data.errors) {
                                if (error.response.data.errors.hasOwnProperty(errorName)) {
                                    this.error += '<br>' + errorName + ': ' + error.response.data.errors[errorName];
                                }
                            }
                            return;
                        }
                        this.error = 'Ошибка генерации ссылки';
                    })
                    .then(() => {
                        this.process = false;
                    });
            },
        }
    }
</script>
