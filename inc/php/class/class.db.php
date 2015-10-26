<?php
defined("ACCESS") or die("RESTRICTED ACCESS");

class db
{
    private $con = '';
    private $resQuery;
    private $userId=null;

    function __construct()
    {
        $this->connect();
        $this->install();
    }

    function __destruct()
    {
        $this->close();
    }

    function connect()
    {
        require_once __DIR__.'/../../../config.php';
        $this->con = mysqli_connect
        (
            DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE
        ) or die(mysqli_error());
        return $this->con;
    }

    function close()
    {
        mysqli_close($this->con);
    }

    function query($query)
    {
        $res=mysqli_query($this->con, $query) or die(mysqli_error($this->con));
        return $res;
    }

    private function install()
    {
        $this->query
        ("
            CREATE TABLE IF NOT EXISTS `regform`
            (
              `id`           int(11) NOT NULL auto_increment,
              `surname`      varchar(50) NOT NULL default '',
              `name`         varchar(50) NOT NULL default '',
              `patronymic`   varchar(50) NOT NULL default '',
              `birthdate`    varchar(10) NOT NULL default '',
              `city`         varchar(50) NOT NULL default '',
              `education`    varchar(50) NOT NULL default '',
              `job`          varchar(50) NOT NULL default '',
              `login`        varchar(50) NOT NULL default '',
              `password`     varchar(50) NOT NULL default '',
              `email`        varchar(50) NOT NULL default '',
              `phone`        varchar(16) NOT NULL default '',
              `relationship` int(1)      NOT NULL default 0,
              `sex`          varchar(1)  NOT NULL default '',
              `question`     varchar(50) NOT NULL default '',
              `fphoto`       LONGTEXT    NOT NULL default '',
              PRIMARY KEY (id),
              UNIQUE KEY `login` (`login`),
              UNIQUE KEY `email` (`email`)
            )
      ");
    }

    public function insertDt($fDt, $fphoto)
    {
        $pass=md5( $fDt["login"].$fDt["password"] );
        $this->query
        ("
            INSERT INTO `regform`
            (
                `surname`, `name`, `patronymic`, `birthdate`,
                `city`, `education`,
                `job`, `login`, `password`,`email`, `phone`,
                `relationship`, `sex`, `question`, `fphoto`
            )
            VALUES
            (
                '{$fDt["surname"]}', '{$fDt["name"]}',
                '{$fDt["patronymic"]}', '{$fDt["birthdate"]}',
                '{$fDt["city"]}', '{$fDt["education"]}',
                '{$fDt["job"]}', '{$fDt["login"]}',
                '{$pass}', '{$fDt["email"]}',
                '{$fDt["phone"]}', '{$fDt["relationship"]}',
                '{$fDt["sex"]}', '{$fDt["question"]}',
                '{$fphoto}'
            )
        ");
        $this->userId=mysqli_insert_id($this->con);
    }

    public function getUid()
    {
        return $this->userId;
    }

    private function selQuery($login,$pass)
    {
        $pass=md5( $login.$pass );
        if( !empty($this->userId) )
        {
            $wh="`id`=".($this->userId);
        }else{
           $wh="`login`='{$login}'
                AND
				`password`='{$pass}'";
        }

        $this->resQuery = $this->query
        (
            "
				SELECT
                    `id`, `surname`, `name`, `patronymic`,
                    `birthdate`, `city`, `education`, `job`,
                    `email`, `phone`, `relationship`,
                    `sex`, `question`, `fphoto`
				FROM
					`regform`
				WHERE {$wh}

            "
        );
    }
    public function getData($login=null,$pass=null)
    {
        $this->selQuery($login,$pass);
        $dt = null;
           if (mysqli_num_rows($this->resQuery) > 0)
           {
                $row = mysqli_fetch_assoc($this->resQuery);
                $this->userId = $row["id"];
                $dt = $row;
           }
        return $dt;
    }
}
?>