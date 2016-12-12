<?php

namespace Drupal\nikadevs_cms\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\taxonomy\Entity\Term;

/**
 * NikaDevsCmsController.
 */
class NikaDevsCmsController extends ControllerBase
{

    protected $database;

    /**
     * Constructor.
     */
    public function __construct(Connection $database)
    {
        $this->database = $database;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('database')
        );
    }

    public function nikadevs_cms_admin()
    {
        $element = array(
            '#markup' => 'Welcome to NikaDevs Admin pages.',
        );
        return $element;
    }

    public function nikadevs_cms_drop_layout_builder()
    {

    }

    public function nikadevs_cms_layout_builder_update()
    {
      module_load_include('inc','nikadevs_cms','inc/nikadevs_cms');
        //$current_theme = variable_get('theme_default', 'none');
        $layouts = unserialize(\Drupal::configFactory()->getEditable('nikadevs_cms.settings')->get('nikadevs_cms_layout'));

        if(isset($_POST['op']) && $_POST['op'] == 'delete') {
            unset($layouts[$_POST['id']]);
        }
        else {
            $layouts[$_POST['id']] = $_POST['layout'];
        }
        //variable_set('nikadevs_cms_layout_' . $current_theme, $layouts);
        \Drupal::configFactory()->getEditable('nikadevs_cms.settings')->set('nikadevs_cms_layout', serialize($layouts))->save();
        exit;
    }

    public function nikadevs_cms_block_settings_update()
    {


//    $block_settings = $_GET['block_settings'];
//    $settings = variable_get('nikadevs_cms_block_settings_' . $block_settings['theme'], array());
//    $settings[$block_settings['block_id']] = $block_settings;
//    variable_set('nikadevs_cms_block_settings_' . $block_settings['theme'], $settings);
//    drupal_json_output($settings);
//    drupal_exit();


        $element = array(
            '#markup' => 'Settings update.',
        );
        return $element;
    }

    public function nikadevs_cms_filedelete()
    {

//    if(isset($file->fid)) {
//      file_delete($file);
//      drupal_exit();
//    }


        $element = array(
            '#markup' => 'File delete',
        );
        return $element;

    }


}
