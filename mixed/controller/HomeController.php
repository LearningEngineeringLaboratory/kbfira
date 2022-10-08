<?php

class HomeController extends CoreController {
  
  function index() {
    $host = Core::lib(Core::CONFIG)->get('default_collab_host');
    $port = Core::lib(Core::CONFIG)->get('default_collab_port');
    Core::lib(Core::CONFIG)->set('collabhost', $host, CoreConfig::CONFIG_TYPE_CLIENT);
    Core::lib(Core::CONFIG)->set('collabport', $port, CoreConfig::CONFIG_TYPE_CLIENT);
    
    $this->ui->useCoreClients();
    $this->ui->usePlugin('core-runtime', 'kitbuild-ui', 'kitbuild', 'kitbuild-analyzer', 'kitbuild-logger', 'kitbuild-collab', 'general-ui', 'highlight', 'showdown');
    $this->ui->useScript("mixed.js");
    $this->ui->useStyle("mixed.css");
    
    $this->ui->view('head.php', ['title' => 'Mixed Kit-Build'], CoreView::CORE);
    $this->ui->view("mixed.php");
    $this->ui->pluginView("general-ui", null, 0);
    $this->ui->view('foot.php', null, CoreView::CORE);
  }

}