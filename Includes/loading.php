<?php
$color    = $color   ?? "bg-[#FFFFFF]";
$size     = $size    ?? "w-2.5 h-2.5";
$message  = $message ?? "Please wait…";
$redirect = $redirect ?? null;
$delay    = $delay   ?? 1500;

$isStandalone = !defined('LOADING_OVERLAY');
?>

<?php if ($isStandalone): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center" style="background: rgba(0,0,0,0.85);">

    <div class="flex flex-col items-center gap-4">
        <div class="flex items-center justify-center space-x-2">
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:-0.3s]"></div>
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:-0.15s]"></div>
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce"></div>
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:0.15s]"></div>
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:0.3s]"></div>
        </div>
        <p class="text-sm text-white font-medium"><?= htmlspecialchars($message) ?></p>
    </div>

    <?php if ($redirect): ?>
    <script>
        setTimeout(() => { window.location.href = "<?= htmlspecialchars($redirect) ?>"; }, <?= (int)$delay ?>);
    </script>
    <?php endif; ?>

</body>
</html>

<?php else: ?>

<div id="loadingModal"
     style="display:none; position:fixed; inset:0; z-index:50; align-items:center; justify-content:center; background:rgba(0,0,0,0.45); backdrop-filter:blur(2px);">

    <div class="flex flex-col items-center gap-4">
        <div class="flex items-center justify-center space-x-2">
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:-0.3s]"></div>
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:-0.15s]"></div>
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce"></div>
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:0.15s]"></div>
            <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:0.3s]"></div>
        </div>
        <p id="loadingMessage" class="text-sm text-white font-medium"><?= htmlspecialchars($message) ?></p>
    </div>
</div>

<script>
window.showLoadingModal = function(msg) {
    const modal = document.getElementById('loadingModal');
    if (msg) document.getElementById('loadingMessage').textContent = msg;
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
};
window.hideLoadingModal = function() {
    document.getElementById('loadingModal').style.display = 'none';
    document.body.style.overflow = '';
};
</script>

<?php endif; ?>