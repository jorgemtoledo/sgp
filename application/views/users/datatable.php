
<script src="<?php echo base_url('assets/sb-admin-v2/js/jquery.min.js') ?>"></script>
    <div class="container">
    <table class="table table-striped" id="table_id" width="100%">
    <thead>
    <tr>
    <td>ID</td>
    <td>Nome</td>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($listEmployees as $employee) { ?>
    <tr>
    <td><?php echo $employee->eid; ?></td>
    <td><?php echo $employee->ename; ?></td>

    </tr>
    <?php } ?>
    </tbody>
    </table>

    </div>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
        });
        });
    </script>