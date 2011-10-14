<?php

namespace Snowcap\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Snowcap\SiteBundle\Entity\Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity
 */
class Project extends Content
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
	 * @Assert\MinLength(5)
     */
    protected $title;
	
	/**
	 * @var string
	 * 
	 * @ORM\Column(name="slug", type="string", length=255)
	 * @Assert\MinLength(5)
	 */
	protected $slug;
	 
    /**
     * @var text $body
     *
     * @ORM\Column(name="body", type="text")
     */
    protected $body;

    /**
     * @var datetime $published_at
     *
     * @ORM\Column(name="published_at", type="datetime")
     */
    protected $published_at;

    /**
     * @ORM\ManyToOne(targetEntity="Agency", inversedBy="projects")
     * @ORM\JoinColumn(name="agency_id", referencedColumnName="id")
     */
    private $agency;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="projects")
     * @ORM\JoinTable(name="project_tag")
     */
    private $tags;

    public function __construct() {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
	
	/**
	 * Set slug
	 * 
	 * @param string s$lug
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;	
	}
	
	/**
	 * Get slug
	 * 
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}
	
    /**
     * Set body
     *
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return text $body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set published_at
     *
     * @param datetime $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->published_at = $publishedAt;
    }

    /**
     * Get published_at
     *
     * @return datetime $publishedAt
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }

    public function setAgency($agency)
    {
        $this->agency = $agency;
    }

    public function getAgency()
    {
        return $this->agency;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getTags()
    {
        return $this->tags;
    }
}