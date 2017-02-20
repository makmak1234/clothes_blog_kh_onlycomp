<?php
namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Console\Output\OutputInterface;
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;

/**
 * childrenGoodsCategory controller.
 *
 * @Route("/commandline")
 */
class commandLineController extends Controller
{
	/**
     * Lists all childrenGoodsCategory entities.
     *
     * @Route("/{command}", name="mycommand")
     * @Method("GET")
     */
    public function myCommandAction($command, Request $request)
    {
        $kernel = $this->get('kernel');
        $application = new Application($kernel);
        $application->setAutoExit(false);

        if(null !== $request->query->get('ext')){
            $ext = $request->query->get('ext');
        }
        else{
            $ext = '--ansi';
        }

        var_dump($ext);

        // 1) 'doctrine:schema:drop?ext=--force'  удалить все таблицы
        // 2) удалить в базе таблицу миграции
        // 3) doctrine:migrations:diff  создать миграционный класс  
        // 4) 'doctrine:migrations:migrate'   создать таблицы из класса миграции
        // 5) занести в базу картинки
        // 6) 'doctrine:fixtures:load?ext=--append'  заполнить базу тестовыми данными
        $input = new ArrayInput(array(
           'command' => $command, 
           $ext => '',
        ));
        // You can use NullOutput() if you don't need the output
        $output = new BufferedOutput(
            OutputInterface::VERBOSITY_NORMAL,
            true // true for decorated
        );
        $application->run($input, $output);

        // return the output, don't use if you used NullOutput()
        $converter = new AnsiToHtmlConverter();
        $content = $output->fetch();

        // return new Response(""), if you used NullOutput()
        return new Response($converter->convert($content));
    }
}