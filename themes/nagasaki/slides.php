<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>{{ head_title }}</title>
    <?php foreach ($this->css as $file => $media): ?>
    <link rel="stylesheet" media="<?= $media ?>" href="<?= $this->baseDir ?><?= $file ?>">
    <?php endforeach; ?>
    <?php foreach ($this->js as $js): ?>
    <script type="text/javascript" src="<?= $this->baseDir ?><?= $js ?>"></script>
    <?php endforeach; ?>
</head>
<body>
<div id="blank"></div>
<div class="presentation">
    <div id="time">
        <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
    </div>
    <div id="current_presenter_notes">
        <div id="presenter_note"></div>
    </div>
    <div class="slides">
        <?php foreach ($this->slides as $count => $slide): ?>
        <!-- slide source: {% if slide.source %}{{ slide.source.rel_path }}{% endif %} -->
        <div class="slide-wrapper">
            <div class="slide">
                <div class="inner">
                    <?php if ($slide['header']): ?>
                    <header><?= $slide['header'] ?></header>
                    <?php endif; ?>
                    <?php if ($slide['content']): ?>
                    <section><?= $slide['content'] ?></section>
                    <?php endif; ?>
                </div>
                <!--<div class="presenter_notes">
                    <header><h1>Notes</h1></header>
                    <section>
                        {% if slide.presenter_notes %}
                        {{ slide.presenter_notes }}
                        {% endif %}
                    </section>
                </div>
                -->
                <footer>
                    <!--
                    {% if slide.source %}
                    <aside class="source">
                        Source: <a href="{{ slide.source.rel_path }}">{{ slide.source.rel_path }}</a>
                    </aside>
                    {% endif %}
                    -->
                    <aside class="page_number">
                        <?= $count + 1 ?>/<?= count($this->slides) ?>
                    </aside>
                </footer>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!--{% if toc %}-->
<div id="toc" class="sidebar hidden">
    <h2>Table of Contents</h2>
    <table>
        <caption>Table of Contents</caption>
        <?php foreach ($this->slides as $count => $slide): ?>
        <tr id="toc-row-<?= $count ?>">
            <th><a href="#slide<?= $count ?>"><?= $slide['header'] ?></a></th>
            <td><a href="#slide<?= $count ?>"><?= $count + 1 ?></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<!--{% endif %}-->
<div id="help" class="sidebar hidden">
    <h2>Help</h2>
    <table>
        <caption>Help</caption>
        <tr>
            <th>Table of contents</th>
            <td>t</td>
        </tr>
        <tr>
            <th>Exposé</th>
            <td>ESC</td>
        </tr>
        <tr>
            <th>Autoscale</th>
            <td>e</td>
        </tr>
        <tr>
            <th>Full screen slides</th>
            <td>f</td>
        </tr>
        <tr>
            <th>Presenter view</th>
            <td>p</td>
        </tr>
        <tr>
            <th>Source files</th>
            <td>s</td>
        </tr>
        <tr>
            <th>Slide numbers</th>
            <td>n</td>
        </tr>
        <tr>
            <th>Blank screen</th>
            <td>b</td>
        </tr>
        <tr>
            <th>Notes</th>
            <td>2</td>
        </tr>
        <tr>
            <th>Help</th>
            <td>h</td>
        </tr>
    </table>
</div>
<script>$().landslide();</script>
</body>
</html>
