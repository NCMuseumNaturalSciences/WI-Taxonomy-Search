<template>
    <div class="template-wrapper">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <p>Please copy and paste each identification into the textarea to the right, one identification per line. Each identification defines a single taxon concept using one or more words (e.g. scientific name). Each bulk search is limited to 250 total records returned.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <form>
                    <div class="form-group">
                        <textarea class="form-control" name="search" v-model="terms" rows="6" cols="20" spellcheck="false"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="search_type" v-model="searchType" value="exact" checked>Exact
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="search_type" v-model="searchType" value="fuzzy">Fuzzy
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-md" id="btnSubmit" @click="search">SEARCH</button>
                        <span v-if="success">
                            <button type="button" class="exportCSV btn btn-primary btn-md" v-on:click="exportAllTablesCSV()">Export All Results</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <div class="alert alert-danger" role="alert" v-if="error">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            {{ error }}
        </div>

        <div id="results-container">
            <div v-if="loading">
                <div class="preloader-wrapper ui">
                    <img src="/images/preloaders/preloader_41.gif"/>
                </div>
            </div>

            <div class="row" v-for="(result, index) of results">
                <div class="col table-col">
                    <div class="card card-plain card-search-results">
                        <h2 class="card-header">
                            <a data-toggle="collapse" v-bind:href="'#'+ result.term" aria-expanded="true"
                               aria-controls="collapse-results" id="heading-collapse" class="d-block">{{ result.term }}
                                <i class="fa fa-chevron-down float-right"></i>
                            </a>
                        </h2>
                        <div v-if="success" v-bind:id="result.term" class="collapse show" aria-labelledby="heading">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table v-bind:id="'table-' + index" class="table table-striped match-results-table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="col col1">Class</th>
                                                <th class="col col2">Order</th>
                                                <th class="col col3">Family</th>
                                                <th class="col col4">Genus</th>
                                                <th class="col col5">Species</th>
                                                <th class="col col6">Common Name</th>
                                                <th>WI GUID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="record of result.matches">
                                                <td>{{ record.class }}</td>
                                                <td>{{ record._order }}</td>
                                                <td>{{ record.family }}</td>
                                                <td>{{ record.genus }}</td>
                                                <td>{{ record.species }}</td>
                                                <td>{{ record.commonNameEnglish }}</td>
                                                <td>{{ record.uniqueIdentifier }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Number of Matches: {{ result.matchesCount }}</p>
                                    <button type="button" class="exportCSV btn btn-primary btn-md" :data-table="index" v-on:click="exportTableCSV(index)">Export</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p v-if="success">
                <button type="button" class="exportCSV btn btn-primary btn-md" v-on:click="exportAllTablesCSV()">Export All Results</button>
            </p>
        </div>
    </div>
</template>

    <script>

        function buildUrl (url) {
            return '/api/v1/wildlife-insights/taxonomy/search?terms=';
        }

        export default {
            name: "WildlifeInsightsTaxonomySearchComponent",
            data() {
                return {
                    results: [],
                    loading: false,
                    error: false,
                    terms: null,
                    searchType: 'exact',
                    noResults: false,
                    success: false,
                }
            },
            mounted() {
                console.log('Component mounted.')
            },
            methods: {
                search: function () {
                    let url = buildUrl();
                    let typeUrl = '&search_type=';
                    let searchtype = this.searchType;
                    let query = this.terms.replace(/\n/g, ",").replace(/(^[,\s]+)|([,\s]+$)/g, '');
                    this.error = '';
                    this.results = [];
                    this.loading = true;
                    axios.get(url + query + typeUrl + searchtype)
                        .then((response) => {
                            this.results = response.data.data;
                            this.loading = false;
                            this.success = true;
                            this.query = '';
                            this.noResults = this.results.length === 0;
                        }, (error) => {
                            this.loading = false;
                            this.results = error;
                        })

                },
                exportTableCSV: function(index) {
                    console.log("export clicked")
//                    let termIdx = event.target.attributes["data-index"].value;
                    $("#table-" + index).tableExport({type:'csv'});
                },
                exportAllTablesCSV: function() {
                    $("table").tableExport({
                        type:'csv',
                        headers: true,
                        footer: false,
                        trimWhitespace: true,
                    });
                }

            },
            computed: {
            }
        }
    </script>

<style scoped>
    #results-container {
        padding-bottom: 30px;
    }
    #results-container button.exportCSV {
        margin-top: 15px;
    }
    form .form-group .radio-inline {
        margin-right: 12px;
        font-size: 16px;
    }
    form .form-group .radio-inline input {
        margin-right: 10px;
    }
    p {
        font-size: 16px;
    }
    table tbody,
    table thead {
        font-size: 14px;
    }
    table.table .col1 {
        width: 9%;
    }
    table.table .col2,
    table.table .col3,
    table.table .col4,
    table.table .col5,
    table.table .col6 {
        width: 15%;

    }
</style>
