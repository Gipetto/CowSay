<?php
  function doCow($class) {
    /** @var $obj Cowsay\Core\Calf */
    $obj = new $class();

    $poop = false;
    $message = "How now brown " . $class . "." . PHP_EOL;

    $traits = $obj->getSupportedTraits();

    if (!count($traits)) {
      $message .= "I don't support any Traits.";
    } else {
      $message .= "I support the following Traits:";
      foreach ($traits as $trait) {
        if ($trait === "Poop") {
          $poop = true;
        }
        $message .= PHP_EOL . " • " . $trait;
      }
    }

    $obj->setMessage($message);
    if ($poop) {
      $obj->setPoop("oOo");
    }
    return $obj;
  }
?><!doctype html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gipetto: CowSay</title>
  <meta name="description" content="">

  <meta property="og:title" content="CowSay">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta property="og:image:alt" content="">

  <link rel="icon" href="./favicon.png" sizes="any">
  <link rel="icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="./favicon.png">

  <link rel="manifest" href="site.webmanifest">
  <meta name="theme-color" content="#fafafa">
  <style type="text/css">
    :root {
      --gap: 2rem;
      --grid-type: auto-fill;
      --border-radius: 0.75rem;
      --border-radius-inner: 0.5rem;
      --box-shadow: 0.25rem 0.35rem 0.25rem rgb(0 0 0 / 0.25);
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    * {
      margin: 0;
    }

    body {
      font-family: system-ui;
      line-height: 1.8;
      padding: clamp(0.125rem, -1.125rem + 5vw, 2rem);
      text-rendering: optimizeLegibility;
      font-variant-ligatures: common-ligatures;
      font-variant-numeric: oldstyle-nums stacked-fractions;
      text-underline-offset: .13em;
      text-decoration-skip-ink: auto;
    }

    .wrapper {
      width: min(100% - 4rem, 85rem);
      margin-inline: auto;
    }

    h1,
    h2,
    h3 {
      line-height: 1.1;
      margin-block: 2rem 1rem;
    }

    h1 + div,
    h2 + div {
      margin-block: 2rem;
    }

    h1 {
      font-size: clamp(2.5rem, 9vw - 1rem, 4.5rem);
    }

    h2 {
      font-size: clamp(2rem, 8vw - 1rem, 3rem);
    }

    h3 {
      font-size: clamp(1.5rem, 5vw - 1rem, 1.75rem);
    }

    section {
      margin-block: 2rem;
    }

    code,
    .sample {
      font-family: monospace;
      line-height: 1.1rem;
    }

    code {
      white-space: preserve-breaks;
      line-height: 1.1rem;
      display: block;
    }

    code .comment {
      color: beige;
    }

    code .str {
      color: darkseagreen;
    }

    code .var {
      color: palevioletred;
    }

    code .cmd {
      color: cornflowerblue;
    }

    code .src {
      color: peru;
    }

    code .cls {
      color: darkcyan;
    }

    pre {
      overflow: scroll;
    }

    .sample {
      overflow: clip;
      background: black;
      border-radius: var(--border-radius);
      box-shadow:
        0 0 0 1px rgb(100, 100, 100),
        0 0 0 2px rgb(50, 50, 50),
        var(--box-shadow);
    }

    .sample header {
      display: flex;
      flex-direction: row;
    }

    .sample .header-bg {
      background-color: rgb(200 200 200 / 0.3);
    }

    .sample header .controls {
      display: flex;
      gap: 0.5rem;
      flex-direction: row;
      padding: 1.25rem 1rem 0 1rem;
      /* border-end-start-radius: var(--border-radius-inner); */
      border-end-end-radius: var(--border-radius-inner);
    }

    .sample header .controls span {
      border-radius: 100%;
      width: 0.85rem;
      height: 0.85rem;
      background-color: #FF5F56;
    }

    .sample header .controls span:nth-child(2) {
      background-color: #FFBD2E;
    }

    .sample header .controls span:nth-child(3) {
      background-color: #27C93F;
    }

    .sample header .tabs {
      display: flex;
      flex-direction: row;
      gap: 0;
      width: 100%;
    }

    .sample header .tab {
      color: white;
    }

    .sample header .tabs>:last-child {
      flex-grow: 2;
      border-end-start-radius: var(--border-radius-inner);

    }

    .sample header .tab span {
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 0.5rem;
      background-color: black;
      margin-block-start: 0.6rem;
      padding: 0.4rem 1.25rem 0.4rem 1rem;
      border-start-start-radius: var(--border-radius-inner);
      border-start-end-radius: var(--border-radius-inner);
      box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.75);
    }

    .sample .code {
      padding: 1rem 1rem 0.9rem 1rem;
    }

    .cows {
      display: grid;
      gap: var(--gap, 1rem);
      grid-template-columns: repeat(
        var(--grid-type, auto-fit),
        minmax(min(36ch, 100%), 1fr)
      );
      grid-auto-rows: min-content;
      container-type: inline-size;
    }

    .cows.multi-byte {
      grid-template-columns: repeat(
        var(--grid-type, auto-fit),
        1fr
      );
    }

    .cow {
      background-color: lightgray;
      border-radius: var(--border-radius, 1rem);
      padding: 0.5rem 1rem 0 1rem;
    }

    .cow h3 {
      margin: 0.5rem 0 0 0 !important;
      font-family: monospace;
    }

    .cow pre {
      padding: 1rem;
      background-color: white;
      border-radius: var(--border-radius-inner, 1rem);
      box-shadow: var(--box-shadow);
    }

    .icon {
      position: relative;
      vertical-align: baseline;
    }

    a {
      text-decoration: none;
    }

    a span {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <header>
      <h1>Gipetto/CowSay</h1>
    </header>

    <section>
      <p>
        <a href="https://github.com/Gipetto/CowSay/releases"><img src="https://img.shields.io/github/release/Gipetto/CowSay.svg" alt="Release Version" /></a>
        <a href="https://packagist.org/packages/gipetto/cowsay"><img src="https://img.shields.io/packagist/v/Gipetto/CowSay.svg" alt="Packagist Version" /></a>
        <a href="https://github.com/Gipetto/CowSay/actions/workflows/main.yml"><img src="https://github.com/Gipetto/CowSay/actions/workflows/main.yml/badge.svg" alt="Build Status" /></a>
        <img src="https://img.shields.io/badge/Moo-Cow-orange.svg" alt="Moo, Cow" />
      </p>
      <p>
        <a href="https://github.com/Gipetto/CowSay">
          <svg class="icon" role="img" width="16" height="16" viewBox="0 0 24 24" fill="#000" xmlns="http://www.w3.org/2000/svg"><title><!---->GitHub icon<!----></title><g><!----><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path><!----></g></svg>
          <span>View on Github</span>
        </a>
      </p>
  </section>

  <section>
    <p>An extensible PHP port of the <a href="http://en.wikipedia.org/wiki/Cowsay">Linux Cowsay</a> utility.<p>
  </section>

  <section>
    <h2>Requirements</h2>

    <ul>
      <li>Minimum: PHP 8.0.2+</li>
      <li>Recommended: PHP 8.2+</li>
    </ul>

    <p>CowSay will update to stay in step with the latest, actively supported PHP version. <a href="https://www.php.net/supported-versions.php">See the official PHP list of supported versions</a>.</p>
  </section>

    <section>
      <h2>QuickStart</h2>
      <h3>Install</h3>
      <code>
        <pre>$ composer require Gipetto/CowSay</pre>
      </code>

      <h3>Usage</h3>
      <div class="sample">
        <header>
          <div class="controls header-bg">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="tabs">
            <div class="tab header-bg">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon" size="md" viewBox="0 0 24 24" width="28" height="28"><path d="M12 18.08c-6.63 0-12-2.72-12-6.08s5.37-6.08 12-6.08S24 8.64 24 12s-5.37 6.08-12 6.08m-5.19-7.95c.54 0 .91.1 1.09.31.18.2.22.56.13 1.03-.1.53-.29.87-.58 1.09-.28.22-.71.33-1.29.33h-.87l.53-2.76h.99m-3.5 5.55h1.44l.34-1.75h1.23c.54 0 .98-.06 1.33-.17.35-.12.67-.31.96-.58.24-.22.43-.46.58-.73.15-.26.26-.56.31-.88.16-.78.05-1.39-.33-1.82-.39-.44-.99-.65-1.82-.65H4.59l-1.28 6.58m7.25-8.33-1.28 6.58h1.42l.74-3.77h1.14c.36 0 .6.06.71.18.11.12.13.34.07.66l-.57 2.93h1.45l.59-3.07c.13-.62.03-1.07-.27-1.36-.3-.27-.85-.4-1.65-.4h-1.27L12 7.35h-1.44M18 10.13c.55 0 .91.1 1.09.31.18.2.22.56.13 1.03-.1.53-.29.87-.57 1.09-.29.22-.72.33-1.3.33h-.85l.5-2.76h1m-3.5 5.55h1.44l.34-1.75h1.22c.55 0 1-.06 1.35-.17.35-.12.65-.31.95-.58.24-.22.44-.46.58-.73.15-.26.26-.56.32-.88.15-.78.04-1.39-.34-1.82-.36-.44-.99-.65-1.82-.65h-2.75l-1.29 6.58z" fill="#1E88E5"></path></svg>
                MyCow.php
              </span>
            </div>
            <div class="header-bg">&nbsp;</div>
          </div>
        </header>
        <div class="code">
          <code><span class="src">&lt;?php</span>

  <span class="src">use CowSay\Cow;</span>

  <span class="var">$bessie</span> <span class="src">=</span> <span class="src">new</span> <span class="cls">Cow(<span class="str">"Hello, Farm!"</span>)</span>;

  <span class="comment">// store the output in a variable</span>
  <span class="var">$output</span> <span class="src">=</span> <span class="var">$bessie</span><span class="cmd">->say()</span>;
  <span class="cmd">echo</span> <span class="var">$output</span>;

  <span class="comment">// or just echo the object for direct output</span>
  <span class="cmd">echo</span> <span class="var">$bessie</span>;
          </code>
        </div><!-- .code -->
      </div><!-- .sample -->

      <h3>Additional Docs</h3>
      <ul>
        <li><a href="https://github.com/Gipetto/CowSay/blob/master/docs/Carcasses.md">Adding custom Carcasses</a></li>
        <li><a href="https://github.com/Gipetto/CowSay/blob/master/docs/CustomTraits.md">Adding custom Traits</a></li>
      </ul>
    </section>

    <section>
      <h2>Carcasses</h2>
      <div class="cows">
<?php
  require_once "../vendor/autoload.php";

  $carcases = glob("../src/Carcases/*.php");

  foreach ($carcases as $carcass):
    $class = '\\CowSay\\' . basename($carcass, ".php");
    $obj = doCow($class);
?>
        <div class="cow">
          <h3><?= $class; ?></h3>
          <code>
            <pre>
<?= $obj . PHP_EOL; ?>
            </pre>
          </code>
        </div><!-- .cow -->
<?php
    unset($obj);
  endforeach;
?>
      </div><!-- .cows -->
    </section>
    <section>
      <h2>Notes</h3>
      <div class="cows multi-byte">
        <div class="cow">
          <h3>Multi-byte strings:</h3>
          <p>Multi-byte strings may have line length calculation issues<br />
          when combined with single byte characters, but shouldn't break…</p>
          <code>
            <pre>
<?php
  $obj = new CowSay\Cow("", 10);
  $obj->setMessage("UTF8 will truncate to 10 chars. Other byte lengths won't. 现在怎么棕色的牛。这不是多字节字符串的精彩演示吗？ 现在怎么棕色的牛。这不是多字节字符串的精彩演示吗？ 现在怎么棕色的牛。这不是多字节字符串的精彩演示吗？");
  echo $obj;
?>
            </pre>
          </code>
        </div><!-- .cow -->
      </div><!-- .cows -->
    </section>
    <footer>
      &copy; Shawn Parker. ”Allrights“ reserved.
    </footer>
  </div><!-- .wrapper -->
</body>
</html>
