<?php
namespace Snowcap\SiteBundle\Admin;
use Snowcap\AdminBundle\Admin\Content;
use Snowcap\SiteBundle\Entity\Project as ProjectEntity;
/**
 * Project admin class
 * 
 */
class Project extends Content {
    /**
     * @return array
     */
    public function getGridFields()
    {
        return array(
            'title' => array(
                'label' => 'Title'
            ),
            'published_at' => array(
                'label' => 'Published',
                'callback' => function(ProjectEntity $project){return $project->getPublishedAt()->format(\DATE_ATOM);},
            )
        );
    }
    /**
     * @return array
     */
    public function getFormFields()
    {
        return array(
            'title' => array(),
            'slug' => array('type' => 'slug'),
            'introduction' => array('type' => 'textarea'),
            'body' => array('type' => 'textarea'),
            'website' => array(),
            'realisation_period' => array(),
            'published_at' => array(
                'type' => 'datetime',
                'options' => array(
                    'input' => 'datetime',
				    'widget' => 'single_text',
                ),
            ),
            'client' => array(),
            'agency' => array(
                'type' => 'entity',
                'options' => array(
                    'class' => 'SnowcapSiteBundle:Agency',
                    'property' => 'name'
                ),
            ),
            'tags' => array(
                'type' => 'entity',
                'options' => array(
                    'class' => 'SnowcapSiteBundle:Tag',
                    'property' => 'name',
                    'multiple' => true
                )
            )
        );
    }

    public function getContentTitle($content)
    {
        return $content->getName();
    }

}