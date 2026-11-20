<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="tarjeta">
        <?php if ($enviado): ?>
            <div class="aviso aviso-ok">
                Mensaje enviado correctamente.
            </div>

            <section class="datos">
                <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?></p>
                <p><strong>Correo:</strong> <?= htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') ?></p>
                <p><strong>Mensaje:</strong><br>
                    <?= nl2br(htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8')) ?>
                </p>
            </section>

            <div class="acciones">
                <a class="boton" href="index.php">Nuevo mensaje</a>
            </div>
        <?php else: ?>

            <?php if (!empty($errores)): ?>
                <div class="aviso aviso-error">
                    No se puede enviar: completa los tres campos correctamente.
                    <ul>
                        <?php foreach ($errores as $error): ?>
                            <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="index.php" novalidate>
                <div class="campo">
                    <div class="caja <?= isset($errores['nombre']) ? 'error' : '' ?>">
                        <label for="nombre">Nombre:</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="<?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?>"
                            autocomplete="name"
                        >
                    </div>
                    <?php if (isset($errores['nombre'])): ?>
                        <span class="texto-error"><?= htmlspecialchars($errores['nombre'], ENT_QUOTES, 'UTF-8') ?></span>
                    <?php endif; ?>
                </div>

                <div class="campo">
                    <div class="caja <?= isset($errores['correo']) ? 'error' : '' ?>">
                        <label for="correo">Correo:</label>
                        <input
                            type="text"
                            id="correo"
                            name="correo"
                            value="<?= htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') ?>"
                            autocomplete="email"
                        >
                    </div>
                    <?php if (isset($errores['correo'])): ?>
                        <span class="texto-error"><?= htmlspecialchars($errores['correo'], ENT_QUOTES, 'UTF-8') ?></span>
                    <?php endif; ?>
                </div>

                <div class="campo">
                    <div class="caja caja-mensaje <?= isset($errores['mensaje']) ? 'error' : '' ?>">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje"><?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>
                    <?php if (isset($errores['mensaje'])): ?>
                        <span class="texto-error"><?= htmlspecialchars($errores['mensaje'], ENT_QUOTES, 'UTF-8') ?></span>
                    <?php endif; ?>
                </div>

                <div class="acciones">
                    <button class="boton" type="submit">Enviar Correo</button>
                </div>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>
