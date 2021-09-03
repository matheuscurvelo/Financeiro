      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer sidebar-onibus">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/plugins/jszip/jszip.min.js"></script>
    <script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/sorting/date-eu.js"></script>
    <!-- Select2 -->
    <script src="../assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- Mask -->
    <script src="../assets/plugins/jquery-mask-plugin-master/dist/jquery.mask.min.js"></script>
    <!-- InputMask -->
    <script src="../assets/plugins/moment/moment.min.js"></script>
    <script src="../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/plugins/adminlte/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/plugins/adminlte/js/demo.js"></script>

    <script>
      $(document).ready(function() {

        ativar_mascaras();

        $('.select2').select2({
          "language": {
            "noResults": function() {
              return "Nenhum resultado encontrado";
            }
          },
          escapeMarkup: function(markup) {
            return markup;
          }
        });

        $('form').submit(function(e) {
          $(".money").mask("###0.00", {
            reverse: true
          });
          $(".porcent").mask("00.00", {
            reverse: true
          });
        });

        $('.money').on('blur focus', function() {
          $(".money").mask("###0.00", {
            reverse: true
          });
          var valor = Number($(this).val());
          $(".money").mask("#.##0,00", {
            reverse: true
          });
          console.log(1);
          valor = (valor).toLocaleString('pt-BR', {
            minimumFractionDigits: 2
          });
          $(this).val(valor);
        });

        $('.money').trigger('blur');

        //Bootstrap Duallistbox
        var duallistbox = $('.duallistbox').bootstrapDualListbox({
          'moveOnSelect': false,
          moveAllLabel: 'Todos',
          moveSelectedLabel: 'Selecionados',
          removeAllLabel: 'Todos',
          removeSelectedLabel: 'Selecionados',
        });

        //texto digitado em maiusculo
        $("input[type='text'], input[type='search']").on('input', function(e) {
          var ss = e.target.selectionStart;
          var se = e.target.selectionEnd;
          e.target.value = e.target.value.toUpperCase();
          e.target.selectionStart = ss;
          e.target.selectionEnd = se;
        });

        //Date range picker
        $('.periodo').daterangepicker({
          "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
              "Dom",
              "Seg",
              "Ter",
              "Qua",
              "Qui",
              "Sex",
              "Sab"
            ],
            "monthNames": [
              "Janeiro",
              "Fevereiro",
              "Março",
              "Abril",
              "Maio",
              "Junho",
              "Julho",
              "Agosto",
              "Setembro",
              "Outubro",
              "Novembro",
              "Dezembro"
            ],
            "firstDay": 0
          }
        });

        $('select[name="filtro"]').change(function() {
          if ($(this).val() > 3) {
            $('input[name="periodo"]').removeAttr('disabled');
          } else {
            $('input[name="periodo"]').attr('disabled', true);
          }
        });

        var msg = 'oi'; //{$msg ?? ''};
        if (msg == '') {
          $('#modal-default').on('shown.bs.modal', function() {
            $('#modal-default').trigger('focus')
          });
        }

        /* $(':checkbox').click(function (e) { 
          if ($(this).prop('checked')){
            $('input[type="hidden"][name="'+ $(this).attr('name') +'"]').remove();
          }else{
            $(this).after('<input type="hidden" value="N" name="'+ $(this).attr('name') +'">');
          }
        }); */

      });

      function checkbox(elemento) {
        if ($(elemento).prop('checked')){
          $('input[type="hidden"][name="'+ $(elemento).attr('name') +'"]').remove();
        }else{
          $(elemento).after('<input type="hidden" value="N" name="'+ $(elemento).attr('name') +'">');
        }
      }

      function converter_para_real(valor) {
        var formatado = new Number(valor).toLocaleString("pt-BR", {
          minimumFractionDigits: 2
        });
        return (valor != null) ? formatado : null;
      }

      //codifica json para url encode
      function xwwwfurlenc(srcjson) {
        if (typeof srcjson !== "object")
          if (typeof console !== "undefined") {
            console.log("\"srcjson\" is not a JSON object");
            return null;
          }
        u = encodeURIComponent;
        var urljson = "";
        var keys = Object.keys(srcjson);
        for (var i = 0; i < keys.length; i++) {
          urljson += u(keys[i]) + "=" + u(srcjson[keys[i]]);
          if (i < (keys.length - 1)) urljson += "&";
        }
        return urljson;
      }

      //decodifica json para url encode
      function dexwwwfurlenc(urljson) {
        var dstjson = {};
        var ret;
        var reg = /(?:^|&)(\w+)=(\w+)/g;
        while ((ret = reg.exec(urljson)) !== null) {
          dstjson[ret[1]] = ret[2];
        }
        return dstjson;
      }

      function ativar_mascaras() {
        console.log('ativando mascaras');
        $(".money").mask("#.##0,00", {
          reverse: true
        });
        $(".km").mask("#.##0,000", {
          reverse: true
        });
        $(".porcent").mask("00,00", {
          reverse: true
        });
        $(".TEL").mask("(00)0000-0000", {
          placeholder: '(__)____-____'
        });
        $(".CEL").mask("(00)00000-0000", {
          placeholder: '(__)_____-____'
        });
        $(".CEP").mask("00000-000", {
          placeholder: '_____-___'
        });
        $(".CNPJ").mask("00.000.000/0000-00", {
          placeholder: '__.___.___/____-__'
        });
        $(".CPF").mask("000.000.000-00", {
          placeholder: '___.___.___-__'
        });

        $(".CPFCNPJ").keydown(function() {
          try {
            $(".CPFCNPJ").unmask();
          } catch (e) {}

          var tamanho = $(".CPFCNPJ").val().length;

          if (tamanho < 11) {
            $(".CPFCNPJ").mask("000.000.000-00");
          } else {
            $(".CPFCNPJ").mask("00.000.000/0000-00");
          }

          // ajustando foco
          var elem = this;
          setTimeout(function() {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
          }, 0);
          // reaplico o valor para mudar o foco
          var currentValue = $(this).val();
          $(this).val('');
          $(this).val(currentValue);
        });

        $(".TELCEL").keydown(function() {
          try {
            $(this).unmask();
          } catch (e) {}

          var tamanho = $(this).val().length;

          if (tamanho < 10) {
            $(this).mask("(00)0000-0000", {
              placeholder: '(__)____-____'
            });
          } else {
            $(this).mask("(00)00000-0000");
          }

          // ajustando foco
          var elem = this;
          setTimeout(function() {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
          }, 0);
          // reaplico o valor para mudar o foco
          var currentValue = $(this).val();
          $(this).val('');
          $(this).val(currentValue);
        });

        $('input').trigger('keydown');
        $('input').trigger('input');
      }

      function select2(elemento,query,objId,objText,tags = false) {
        $(elemento).select2({
            'ajax': {
                url: '../app/CRUD_basico.php',
                type: 'GET',
                data: function (params) {
                    //
                    params.term = params.term == undefined ? '' : params.term;

                    return {
                        query: query,
                        params: { ':termo': '%' + params.term + '%' }
                    }

                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (obj) {
                            return {
                                id: obj[objId],
                                text: obj[objText],
                            };
                        })
                    };
                }
            },
            'language': {
                "errorLoading": function () {
                    return 'Falha ao carregar.';
                },
                "inputTooLong": function (args) {
                    var overChars = args.input.length - args.maximum;
                    var message = 'Por favor, remova ' + overChars + ' caracteres';
                    return message;
                },
                "inputTooShort": function (args) {
                    var remainingChars = args.minimum - args.input.length;
    
                    var message = 'Por favor, insira ' + remainingChars + ' ou mais caracteres';
    
                    return message;
                },
                "loadingMore": function () {
                    return 'Carregando mais informações…';
                },
                "maximumSelected": function (args) {
                    var message = 'Você pode escolher ' + args.maximum + ' elementos';
                    return message;
                },
                "noResults": function () {
                    return 'Nenhum resultado encontrado';
                },
                "searching": function () {
                    return 'Procurando…';
                }
            },
            // para selects que criam uma nova opção:
            'tags': tags,
            'createTag': function (params) {
                var term = $.trim(params.term);
                term = term.toUpperCase();
                if (term === '') {
                    return null;
                }
            
                return {
                    id: term,
                    text: '<i class="fas fa-plus text-success"></i> '+term,
                }
            },
            'escapeMarkup': function (markup) {
                return markup;
            },
        });
      }

      function select2_full(elemento,query,tags = false) {
        $(elemento).select2({
            'ajax': {
                url: '../app/CRUD_basico.php',
                type: 'GET',
                data: function (params) {
                    //
                    params.term = params.term == undefined ? '' : params.term;

                    return {
                        query: query,
                        params: { ':termo': '%' + params.term + '%' }
                    }

                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (obj) {
                          return obj;
                        })
                    };
                }
            },
            'language': {
                "errorLoading": function () {
                    return 'Falha ao carregar.';
                },
                "inputTooLong": function (args) {
                    var overChars = args.input.length - args.maximum;
                    var message = 'Por favor, remova ' + overChars + ' caracteres';
                    return message;
                },
                "inputTooShort": function (args) {
                    var remainingChars = args.minimum - args.input.length;
    
                    var message = 'Por favor, insira ' + remainingChars + ' ou mais caracteres';
    
                    return message;
                },
                "loadingMore": function () {
                    return 'Carregando mais informações…';
                },
                "maximumSelected": function (args) {
                    var message = 'Você pode escolher ' + args.maximum + ' elementos';
                    return message;
                },
                "noResults": function () {
                    return 'Nenhum resultado encontrado';
                },
                "searching": function () {
                    return 'Procurando…';
                }
            },
            // para selects que criam uma nova opção:
            'tags': tags,
            'createTag': function (params) {
                var term = $.trim(params.term);
                term = term.toUpperCase();
                if (term === '') {
                    return null;
                }
            
                return {
                    id: term,
                    text: '<i class="fas fa-plus text-success"></i> '+term,
                }
            },
            'escapeMarkup': function (markup) {
                return markup;
            },
        });
      }

      function select2_search ($el, term) {
        //$el.select2('open');
        
        // Get the search box within the dropdown or the selection
        // Dropdown = single, Selection = multiple
        var $search = $el.data('select2').dropdown.$search || $el.data('select2').selection.$search;
        // This is undocumented and may change in the future
        
        $search.val(term);
        $search.trigger('keyup');
        //setTimeout(function() { $('.select2-results__option').trigger("mouseup"); }, 250);
      }
    </script>
    <?php echo $js ?? null; ?>
    </body>

    </html>