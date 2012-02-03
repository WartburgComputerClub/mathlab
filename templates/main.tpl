<html>
  <head>	
    <link rel="stylesheet" href="css/style.css" />
    {block name=extrastyle}{/block}
    <title>{$title}</title>
    {block name=scripts}{/block}
  </head>
  <body>
    {block name=body}
    <div class="padded bodywrap">
    {block name=main}{/block}
    </div>
    {/block}
  </body>
</html>
