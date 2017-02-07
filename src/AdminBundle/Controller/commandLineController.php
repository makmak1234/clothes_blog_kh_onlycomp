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

        //'doctrine:schema:drop?ext=--force'
        //удалить в базе таблицу миграции
        //'doctrine:migrations:migrate' 
        //занести в базу картинки
        //'doctrine:fixtures:load?ext=--append'
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