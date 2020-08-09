## Story

每个人都有属于自已的故事，我们编织着、叙述着，只为了那个必定动人的结局。

爱上自已的故事，爱上别人的故事，交织着的，是美好，是快乐，是幸福。

> 最近想开始记录一下自已的所见所得，感觉缺了一个可以让人安心记录的地方。
>
> 就这样，Story 诞生了。

Demo: [Yumoe](https://yumoe.com/).

Version@[Halo](https://github.com/ruibaby/halo): [story-halo](https://github.com/ruibaby/story-halo) by [ruibaby](https://github.com/ruibaby), thanks.

Version@[纸小墨](https://www.chole.io/): [ink-theme-story](https://github.com/akkuman/ink-theme-story) by [akkuman](https://github.com/akkuman), thanks.

Version@[VeriPress](https://github.com/veripress/veripress): [Story-for-VeriPress](https://github.com/txperl/Story-for-VeriPress).

### 预览图

[主页](https://i.loli.net/2018/10/09/5bbcbea01d230.png)

![screenshot](screenshot.png)

### 主题的一些食用说明
```

#### 站点名称

在后台填写站点名称，格式 `YUMOE:bbwbb`，`YUMOE`为站点名称，`bbwbb`为背景颜色(b为黑色,w为白色)。一个字符对应一个背景颜色，即 `Y=>b`。默认字符为五个，如果超过或少于五个，请修改`导航自适应`为`开启`(默认为开启)。

#### 背景图

若要设置背景图，请在后台填写图片链接即可，留空为关闭。

#### 导航栏图标

标题旁边有一个 · 字符，点击后便可显示菜单。**1**, **2**, **3** 分别代表 **独立页面菜单**、**导航树**(仅在文章界面有用，仅解析 h3, h4 标签)以及**搜索框**。

若您觉得 1, 2, 3 太抽象，可以在后台设置 `开启` 即可替换成相应 Emoji 图标。

#### 导航树

若要所有文章默认显示导航树，请在后台修改`文章导航树`为`开启`。

若要手动控制，请于 `文章编辑页面-自定义字段` ，添加 `tor` 字符，并设置为 `on` 或者 `off` 。如下图所示：

![set tor](https://i.loli.net/2020/08/01/hBAa4bUm9MS3DgZ.png)

注意，导航树仅解析 h3, h4 标签，并且当页面宽度小于 1024px ，导航树将不再显示。

#### RSS订阅

若要开启RSS订阅，请在后台在后台设置 `开启`即可，会在导航栏下拉菜单中显示。

#### 文章封面图

可为各文章单独设置封面图（显示在方格中）。

请于 `文章编辑页面-自定义字段` ，添加 `cover` 字符，并设置为**相应图片的链接**。如下图所示：

![set cover](https://i.loli.net/2020/08/01/uc36qYJQvEwICgA.png)

#### 友链模板

请参考 [PR: 增加友链模板 #30](https://github.com/txperl/Story-for-Typecho/pull/30)。

#### 其他

其他没有特别说明的基本不需要修改，当然你也可以按照个人兴趣随意修改。

若有什么不清楚可以给我发邮件或是到[主题发布页](https://yumoe.com/archives/story.html)&GitHub询问。

### 写在最后

#### 感谢

* [Art Chen](https://about.me/hermitage)-[Artifact.me](https://artifact.me/)-[Element](https://github.com/artchen/hexo-theme-element) 主题首页样式参考（获得许可）以及部分代码引用
* [Jimmy](https://jimmycai.com/) Yellow 主题评论框参考以及部分代码引用（获得许可）

#### 许可

本程序源代码可任意修改并任意使用，但禁止商业化用途。一旦使用，任何不可知事件都与原作者无关，原作者不承担任何后果。

如果您喜欢，希望可以在页面某处保留原作者(Trii Hsia)版权信息。

感谢。
