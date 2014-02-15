//这儿共有四对引号，分别是按钮的ID、显示名、点一下输入内容、再点一下关闭内容（此为空则一次输入全部内容），\n表示换行。

QTags.addButton( 'H3', 'H3', "\n<h3>\n\n", "</h3>\n" );//H3
QTags.addButton( 'pre', '高亮代码', "\n<pre class='prettyprint'>\n高亮代码\n", "</pre>\n" );//添加高亮代码
QTags.addButton( 'task', '灰色面板', "\n[task]\n灰色面板\n", "[/task]\n" );//添加灰色项目面板
QTags.addButton( 'noway', '红色面板', "\n[noway]\n红色面板\n", "[/noway]\n" );//添加红色禁止面板
QTags.addButton( 'warning', '黄色面板', "\n[warning]\n黄色面板\n", "[/warning]\n" );//添加黄色警告面板
QTags.addButton( 'buy', '绿色面板', "\n[buy]\n绿色面板\n", "[/buy]\n" );//添加绿色购买面板
QTags.addButton( 'Down', '下载', "\n[Downlink href='下载链接']点此下载", "[/Downlink]\n" );//添加下载链接
QTags.addButton( 'music', '音乐', "\n[music]", "[/music]\n" );//添加音乐播放器

