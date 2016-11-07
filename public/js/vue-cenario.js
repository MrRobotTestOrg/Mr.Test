new Vue({
    el: '#app',

    mounted: function () {
        this.fetchSteps()
    },
    data: {
        selectFeature: '',
        featureEscolhida: [],
        cenarioEscolhido: {
            steps: []
        },
        stepsDoCenarioEscolhidoComInput: [],
        cenarios: [],
        steps: [],
        novoStepPreId: [],
        novoStepAcaoId: [],
        novoStepResultadoId: []
    },
    watch: {
        selectFeature: function () {
            this.fetchFeature()
            this.fetchCenarios()
        }
    },
    computed:{
        filtroPre: function () {
            return this.fitrarSteps('Dado', this.cenarioEscolhido.steps)
        },
        filtroAcoes: function () {
            return this.fitrarSteps('Quando', this.cenarioEscolhido.steps)
        },
        filtroResultado: function () {
            return this.fitrarSteps('Entao', this.cenarioEscolhido.steps)
        },
        filtroPreOptions: function () {
            return this.fitrarSteps('Dado', this.steps)
        },
        filtroAcoesOptions: function () {
            return this.fitrarSteps('Quando', this.steps)
        },
        filtroResultadoOptions: function () {
            return this.fitrarSteps('Entao', this.steps)
        }
    },
    methods: {
        fetchFeature: function () {
            this.$http.get($('#base-path').val() + '/api/features/' + this.selectFeature ).then( function (response) {
                this.featureEscolhida = response.data
            }, function (response) {
                // error callback
            });
        },
        fetchCenarios: function() {
            this.$http.get($('#base-path').val() + '/api/cenarios/by-feature/' + this.selectFeature ).then( function (response) {
                this.cenarios = response.data
            }, function (response) {
                // error callback
            });
        },
        fetchSteps: function() {
            this.$http.get($('#base-path').val() + '/api/steps').then( function (response) {
                this.steps = response.data
            }, function (response) {
                // error callback
            });
        },
        buscaCenario: function ( cenario ) {
            this.cenarioEscolhido = cenario

        },
        deletarCenario: function () {
            var vm = this
            new PNotify({
                title: 'Deletar',
                type: 'error',
                text: 'Deseja deletar este cenário?',
                icon: 'glyphicon glyphicon-question-sign',
                hide: false,
                confirm: {
                    confirm: true
                },
                buttons: {
                    closer: false,
                    sticker: false
                },
                history: {
                    history: false
                }
            }).get().on('pnotify.confirm', function() {
                vm.$http.delete($('#base-path').val() + '/api/cenarios/' + vm.cenarioEscolhido.id ).then( function (response) {
                    vm.fetchCenarios()
                    vm.cenarioEscolhido = {
                        steps: []
                    }
                    new PNotify({
                        title: "Deletado!",
                        text: "Cenário removido com sucesso!",
                        type: "success"
                    });
                }, function (response) {
                    new PNotify({
                        title: "Erro!",
                        text: "Problema no servidor, não consegui deletar",
                        type: "warning"
                    });
                });
            }).on('pnotify.cancel', function() {
            });

        },
        ativarSeCenarioEscolhido: function (cenarioId) {
            if (cenarioId == this.cenarioEscolhido.id){
                return true
            }
            return false
        },
        fitrarSteps: function (valorFiltro, steps) {
            if(steps.length < 1){
                return
            }

            return steps.filter(function (step) {
                return step.nome.indexOf(valorFiltro) !== -1
            })
        },
        remover: function (step) {
            var index = this.cenarioEscolhido.steps.indexOf(step);
            this.cenarioEscolhido.steps.splice(index, 1);
        },
        adicionarStepPre: function () {
            this.adicionarStep(this.novoStepPreId)
        },
        adicionarStepAcao: function () {
            this.adicionarStep(this.novoStepAcaoId)
        },
        adicionarStepResultado: function () {
            this.adicionarStep(this.novoStepResultadoId)
        },
        adicionarStep: function (novoStepId) {
            if (novoStepId.length < 1) {
                return false
            }
            var stepASerAdicionado = []
            for (var step of this.steps) {
                if(novoStepId == step.id){
                    stepASerAdicionado = JSON.parse(JSON.stringify(step));
                }
            }
            stepASerAdicionado['pivot'] = {'valor': stepASerAdicionado.nome}

            this.cenarioEscolhido.steps.push(stepASerAdicionado)
        },
        salvarCenario: function () {
            this.$http.post($('#base-path').val() + '/api/cenarios', this.cenarioEscolhido).then( function (response) {
                new PNotify({
                    title: "Salvo!",
                    text: "Cenário salvo com sucesso!",
                    type: "success"
                });
                this.fetchCenarios()
            }, function (response) {
                new PNotify({
                    title: "Erro!",
                    text: "Problema no servidor, não consegui salvar",
                    type: "warning"
                });
            });


        },
        criarCenario: function () {
            this.cenarioEscolhido = {
                titulo: 'Novo Cenário',
                feature_id: this.selectFeature,
                steps: []
            }
        }
    }
})