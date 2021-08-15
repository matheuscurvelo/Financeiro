<div id="acoes_registros" style="display: none;">
    <td>
        <?php if (isset($editar)): ?>
        <a><i class="far fa-edit text-warning my-1 crud" data-acao="U" title="Editar"></i></a>
        <?php endif; if (isset($deletar)): ?>
        <a><i class="far fa-trash-alt text-danger my-1 crud" data-acao="D" title="Deletar"></i></a>
        <?php endif; if (isset($ativar)): ?>
        <a><i class="fas fa-eye crud my-1" data-acao="" title="Ativar"></i></a>
        <?php endif; if (isset($desativar)): ?>
        <a><i class="fas fa-eye-slash crud my-1" data-acao="" title="Desativar"></i></a>
        <?php endif; ?>
    </td>
</div>