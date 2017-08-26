<?php

/*
 * Arquivo de propriedade de Mystic Labs Tecnologia em TI.
 * Todos os arquivos são proprietários, não estão disponíveis para
 * divulgação, sob pena de leis penais internacionais.
 * Autor: Guilherme Santan Coelho
*/
namespace Helper;

/**
 * Classe que retorna algumas tags prontas em HTML.
 *
 * @author Guilherme Santana <mysticlabs.org>
 */
class Html{
    

/*
 * Arquivo de propriedade de Mystic Labs Tecnologia em TI.
 * Todos os arquivos são proprietários, não estão disponíveis para
 * divulgação, sob pena de leis penais internacionais.
 * Autor: Guilherme Santan Coelho
*/

// ------------------------------------------------------------------------


    /**
     *  INSERE ATRIBUTOS DENTRO DA TAG INICIA
     * @param Tag HTML
     **/

    function insereAtributos($tagInicial, $atributos =[]){
        $tagInicial = str_replace(">", '', $tagInicial);
        foreach ($atributos as $chave=>$valor){
            $tagInicial.= " $chave = '$valor' ";
        }
        $tagInicial.=">";
    return $tagInicial;
    }


// ------------------------------------------------------------------------


	/**
	 * Gera um item de menu superior em formato HTML, com um link, titulo, mensagem e data.
	 *
	 * 
	 * @param	$link,$titulo,$msg,$data
	 * @return	$layout
	 */
	function itemMenuComum($link = "#",$titulo = "Um título",$msg = "Mensagem Aqui",$data = "01/01/2017", $atributos = [])
	{
            
            $layout= insereAtributos("<li>",$atributos).''
                    . ' <a href="'.$link.'">
                            <div>
                                <strong>'.$titulo.'</strong>
                                <span class="pull-right text-muted">
                                    <em>'.$data.'</em>
                                </span>
                            </div>
                            <div>'.$msg.'</div>
                        </a>
                    </li>';
		return $layout;
	}


// ------------------------------------------------------------------------

	/**
	 * Gera um card View, com uma imagem, um campo para número, a descrição do número, o link do card e o footer do cardo 
	 *
	 * o estilo é determinado pelo css do Bootstrap: 'default', 'danger', 'success', 'primary' ou uma definido pelo css
	 * @param	$link = "#",$titulo = "Titulo",$num = "0",$rodape = "rodape",$img = "#",$estilo = "default"
         * 
	 * @return	$layout
	 */
	function cardView1($link = "#",$titulo = "Titulo",$num = "0",$rodape = "rodape",$img = "#",$estilo = "default")
	{
            $layout = '<a href="'.$link.'">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-'.$estilo.'">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="'.$img.'" style="width:70px;height: 70px;"">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">'.$num.'</div>
                                            <div>'.$titulo.'</div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="panel-footer">
                                            <span class="pull-left">'.$rodape.'</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                            </div>
                        </div>
                        </a>';
		return $layout;
	}
     

// ------------------------------------------------------------------------


	/**
	 * Gera um item de menu superior, com um link, titulo, mensagem e data.
	 *
	 * 
	 * @param	$link = "#",$titulo = "Um título" ,$msg = "Mensagem Aqui",$porcentagem = "50"
	 * @return	$layout
	 */
	function itemMenuProgresso($link = "#",$titulo = "Um título",$msg = "Mensagem Aqui",$porcentagem = "50")
	{
            $layout='<li>
                        <a href="'.$link.'">
                            <div>
                                <strong>'.$titulo.'<span class="pull-right text-muted">'.$porcentagem.'% Completa</span></p></strong>
                            </div>
                            <div>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$porcentagem.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$porcentagem.'%">
                                        <span class="sr-only">'.$porcentagem.'% Completa (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>';
		return $layout;
	}



// ------------------------------------------------------------------------


	/**
	 * Gera um item de menu minimalista, com um link, titulo, mensagem.
	 *
	 * 
	 * @param	$link = "#",$titulo = "Um título",$class = "fa fa-money fa-fw"
	 * @return	$layout
	 */
	function itemMenuMinimalista($link = "#",$titulo = "Um título",$class = "fa fa-money fa-fw")
	{
            $layout='<li>
                        <a href="'.$link.'"><i class="'.$class.'"></i> 
                            '.$titulo.'
                        </a>
                    </li>';
		return $layout;
	}


// ------------------------------------------------------------------------



	/**
	 * Gera um item de menu com um campo de busca, com um de ação e place holder.
	 *
	 * 
	 * @param	$link = "#",$titulo = "Um título",$placeHolder = "PlaceHolder",$class = "btn btn-default"
	 * @return	$layout
	 */
	function itemMenuBusca($link = "#",$valor = "",$placeHolder = "PlaceHolder",$class = "btn btn-default")
	{
            $layout='<li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="'.$placeHolder.'" value="'.$valor.'">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </li>';
		return $layout;
	}


// ------------------------------------------------------------------------



	/**
	 * Gera um item de menu com uma lista de itens, passados como um array, ou um itemMenu.
	 * é Criado um objeto para ser o seletor do item de lista padrão, podendo ser alterado para
         * qualquer icone.
	 * 
         * DEVE SER OBRIGATORIAMENTE USADO DENTRO DE UMA TAG UL OU FUNÇÃO QUE A GERA.
         * 
         * 
	 * @param	$itensMenu = [],$link = "#", $seletorLista = ''
         * 
         * O padrão do $seletorLista vem : <a class="dropdown-toggle" data-toggle="dropdown" href="'.$link.'">
         *                               <i class="fa fa-tasks fa-fw"></i>  <i class="fa-angle-double-down "></i>
         *                           </a>
         * 
	 * @return	$layout
	 */
	function itemListaDropdown($itensMenu = [],$link = "#", $seletorLista = '')
	{
            if ($seletorLista == '')
                $seletorLista = ' <a class="dropdown-toggle" data-toggle="dropdown" href="'.$link.'">
                                    <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                </a>';
            $layout='<li class="dropdown">'.$seletorLista.'<ul class="dropdown-menu dropdown-tasks">';
            if (is_array($itensMenu)){
                foreach ($itensMenu as $item){
                    if (is_array($item)){
                        $layout.= itemListaDropdown("#", $item);
                    }
                    else{
                        $layout.= $item;
                    }
                    
                }
            }else{
                $layout.=$itensMenu;
            }
            $layout .='</ul></li>';
		return $layout;
	}



// ------------------------------------------------------------------------


	/**
	 * Gera um item de menu minimalista, no estilo colapsado, com um link, titulo, mensagem.
	 *
	 * 
	 * @param	$link = "#",$titulo = "Um título",$class = "fa fa-money fa-fw"
	 * @return	$layout
	 */
	function menuColapsado($itensMenu = [])
	{
            $layout='<nav>
                        <div class="navbar-default sidebar" role="navigation">
                            <div class="sidebar-nav navbar-collapse">
                                <ul class="nav" id="side-menu">';
            
            if (is_array($itensMenu)){
                foreach($itensMenu as $indice => $item) {
                    $layout.=$item;
                }
            }
            else{
                $layout.=$itensMenu;
                }
                 
                $layout.='      </ul></div>
                            <!-- /.sidebar-collapse -->
                        </div>
                        <!-- /.navbar-static-side -->
                    </nav>';
		return $layout;
	}


// ------------------------------------------------------------------------


    function row($conteudo = null){
        if ($conteudo != null){
        if (is_array($conteudo)){
            $layout = '<div class="row">';
            foreach ($conteudo as $indice=>$valor){
                $layout .= $valor;
            }
            $layout.='</div>';
        }else{
            $layout = '<div class="row">'.$conteudo.'</div>';
        }
         return($layout);
        }
    }



// ------------------------------------------------------------------------


	/**
	 * Gera uma tabela de acordo com os parametros passados
	 * é necessario passar o nome das colunas como parametro
	 * melhor passar por array
	 * @param	$titulo = "TÍTULO", $colunas = ['Coluna 1', 'Coluna 2'],$dados = [] , $atributosTabela = []
	 * @return	$layout
	 */
	function tabela($colunas = ['Coluna 1', 'Coluna 2'],$dados = [0=>['Dado 1', 'Dado 2']] , $atributosTabela = ['class'=>'table table-bordered table-hover table-striped'])
	{
            $layout='<table ';
            foreach ($atributosTabela as $chave=>$valor){
                $layout.= "$chave = '$valor' ";
            }
            $layout.='>';
            
            //Parte do cabecalho da tabela:
            $layout.='<thead><tr>';
            foreach ($colunas as $coluna){
                $layout.='<th>';
                $layout.=$coluna;
                $layout.='</th>';
            }
            $layout.='<thead>';

            //PARTE DO CORPO DA TABELA:
            $layout.='<body>';
            
            if (!is_array($dados)){
                $dadox = &$dados;
            }
            
            foreach ($dados as $linha => $dado){
                
                if (is_array($dado)){
                    $layout.= '<tr>';
                    
                    foreach ($dado as $i => $valor){
                        $layout.= '<td>';
                        $layout.= $valor;
                        $layout.= '</td>';
                    }
                    $layout.= '</tr>';
                }
                
            }
            $layout.= '</tr>';
            $layout.= '</body>';
            $layout.= '</table>';
		return $layout;
	}


// ------------------------------------------------------------------------

  
    function barraNavegacaoSuperiorPadrao($header = null, $conteudo= ""){
        $layout = '<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">';
        //INSERE O HEADER DO NAV
        $layout .= '<div class="navbar-header">';
        $layout .= $conteudo;
        $layout .= '</div>';
        $layout .= '</nav>'; 
        return($layout);
    }



// ------------------------------------------------------------------------
}
