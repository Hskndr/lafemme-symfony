<?php

namespace BackendBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $nick;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $postalcode;

    /**
     * @var string
     */
    private $datebirth;

    /**
     * @var string
     */
    private $age;

    /**
     * @var string
     */
    private $zodiacsing;

    /**
     * @var string
     */
    private $race;

    /**
     * @var string
     */
    private $lookingfor;

    /**
     * @var string
     */
    private $bodytype;

    /**
     * @var string
     */
    private $height;

    /**
     * @var string
     */
    private $weight;

    /**
     * @var string
     */
    private $coloreyes;

    /**
     * @var string
     */
    private $colorhair;

    /**
     * @var string
     */
    private $hairlength;

    /**
     * @var string
     */
    private $tatoos;

    /**
     * @var string
     */
    private $bio;

    /**
     * @var string
     */
    private $active;

    /**
     * @var string
     */
    private $image;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nick
     *
     * @param string $nick
     *
     * @return User
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return User
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     *
     * @return User
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set datebirth
     *
     * @param string $datebirth
     *
     * @return User
     */
    public function setDatebirth($datebirth)
    {
        $this->datebirth = $datebirth;

        return $this;
    }

    /**
     * Get datebirth
     *
     * @return string
     */
    public function getDatebirth()
    {
        return $this->datebirth;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set zodiacsing
     *
     * @param string $zodiacsing
     *
     * @return User
     */
    public function setZodiacsing($zodiacsing)
    {
        $this->zodiacsing = $zodiacsing;

        return $this;
    }

    /**
     * Get zodiacsing
     *
     * @return string
     */
    public function getZodiacsing()
    {
        return $this->zodiacsing;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return User
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set lookingfor
     *
     * @param string $lookingfor
     *
     * @return User
     */
    public function setLookingfor($lookingfor)
    {
        $this->lookingfor = $lookingfor;

        return $this;
    }

    /**
     * Get lookingfor
     *
     * @return string
     */
    public function getLookingfor()
    {
        return $this->lookingfor;
    }

    /**
     * Set bodytype
     *
     * @param string $bodytype
     *
     * @return User
     */
    public function setBodytype($bodytype)
    {
        $this->bodytype = $bodytype;

        return $this;
    }

    /**
     * Get bodytype
     *
     * @return string
     */
    public function getBodytype()
    {
        return $this->bodytype;
    }

    /**
     * Set height
     *
     * @param string $height
     *
     * @return User
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return User
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set coloreyes
     *
     * @param string $coloreyes
     *
     * @return User
     */
    public function setColoreyes($coloreyes)
    {
        $this->coloreyes = $coloreyes;

        return $this;
    }

    /**
     * Get coloreyes
     *
     * @return string
     */
    public function getColoreyes()
    {
        return $this->coloreyes;
    }

    /**
     * Set colorhair
     *
     * @param string $colorhair
     *
     * @return User
     */
    public function setColorhair($colorhair)
    {
        $this->colorhair = $colorhair;

        return $this;
    }

    /**
     * Get colorhair
     *
     * @return string
     */
    public function getColorhair()
    {
        return $this->colorhair;
    }

    /**
     * Set hairlength
     *
     * @param string $hairlength
     *
     * @return User
     */
    public function setHairlength($hairlength)
    {
        $this->hairlength = $hairlength;

        return $this;
    }

    /**
     * Get hairlength
     *
     * @return string
     */
    public function getHairlength()
    {
        return $this->hairlength;
    }

    /**
     * Set tatoos
     *
     * @param string $tatoos
     *
     * @return User
     */
    public function setTatoos($tatoos)
    {
        $this->tatoos = $tatoos;

        return $this;
    }

    /**
     * Get tatoos
     *
     * @return string
     */
    public function getTatoos()
    {
        return $this->tatoos;
    }

    /**
     * Set bio
     *
     * @param string $bio
     *
     * @return User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set active
     *
     * @param string $active
     *
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return User
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}

