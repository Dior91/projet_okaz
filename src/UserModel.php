<?php
require_once "MainModel.php";
require_once "User.php";
require_once dirname(__DIR__) . "/utils/utils.php";

class UserModel extends MainModel
{
    /**
     * Méthode pour chercher un utilisateur
     */
    public function searchUser()
    {
        $loggedUser = getLoggedUser();
        // dd($_SESSION["okaz_logged_user"]);
        $query = $this->pdo->query("SELECT * FROM dda_users WHERE id = " . $loggedUser['id']);
        $query->setFetchMode(PDO::FETCH_CLASS, "User");
        return $query->fetch();
    }
    /**
     * Méthode pour retourner un utilisateur
     */
    public function getUser()
    {
        $user = $this->searchUser();
        $data = [
            "id" => $user->getId(),
            "firstname" => $user->getFirstname(),
            "lastname" => $user->getLastname(),
            "email" => $user->getEmail(),
            "telephone" => $user->getTelephone(),
            "address" => $user->getAddress(),
            "postal_code" => $user->getPostal_code(),
            "city" => $user->getCity(),
            "created_at" => $user->getCreated_at(),
        ];
        return $data;
    }

    /**
     * Méthode pour enregistrer un utilisateur
     */
    public function signupUser()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "firstname" => "",
                "lastname" => "",
                "email" => "",
                "address" => "",
                "postal_code" => "",
                "city" => "",
                "telephone" => "",
                "errorEmail" => "",
                "errorTelephone" => "",
                "errorPostal_code" => "",
                "errorConfirm" => "",
                "errorEmail_exist" => ""
            ];

            // On stock chacun de nos inputs dans une variable
            $firstname = $_POST["firstname"];
            $data["firstname"] = $firstname;

            $lastname = $_POST["lastname"];
            $data["lastname"] = $lastname;

            $email = $_POST["email_signup"];
            $data["email"] = $email;

            $address = $_POST["address"];
            $data["address"] = $address;

            $postal_code = $_POST["postal_code"];
            $data["postal_code"] = $postal_code;

            $city = $_POST["city"];
            $data["city"] = $city;

            $telephone = $_POST["telephone"];
            $data["telephone"] = $telephone;

            $password = $_POST["password_signup"];
            $confirm = $_POST["confirm"];

            $query = $this->pdo->query("SELECT * FROM `dda_users` WHERE email = '$email'");
            $query->setFetchMode(PDO::FETCH_CLASS, "User");
            $user = $query->fetch();

            if ($user) {
                $data["errorEmail_exist"] = "Il semble que vous soyez déjà inscrit sur OKAZ";
            }


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data["errorEmail"] = "Merci de remplir un email valide";
            }

            if (!empty($telephone) && !filter_var($telephone, FILTER_VALIDATE_FLOAT)) {
                $data["errorTelephone"] = "Merci de remplir un numéro de téléphone valide";
            }
            if (!filter_var($postal_code, FILTER_VALIDATE_FLOAT)) {
                $data["errorPostal_code"] = "Merci de remplir un code postal valide";
            }


            if ($password !== $confirm) {
                $data["errorConfirm"] = "Les mots de passe ne correspondent pas";
            }



            if (!empty($data["errorEmail"]) || !empty($data["errorTelephone"]) || !empty($data["errorConfirm"]) || !empty($data["errorPostal_code"]) || !empty($data["errorEmail_exist"])) {
                return $data;
            }

            // Si nous n'avons pas d'erreurs, nous pouvons traiter les données.
            // $firstname = htmlspecialchars($firstname); => filtrer les strings sous PHP8
            $firstname = htmlspecialchars($firstname);
            $lastname = htmlspecialchars($lastname);
            $telephone = filter_var($telephone, FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $address = htmlspecialchars($address);
            $postal_code = htmlspecialchars($postal_code);
            $city = htmlspecialchars($city);

            // On veut hasher le mot de passe
            $password = password_hash($password, PASSWORD_DEFAULT);

            // On prépare notre requête SQL
            $query = $this->pdo->prepare("
        INSERT INTO `dda_users` (firstname, lastname, telephone, email, address, postal_code, city, password)
        VALUES (:firstname, :lastname, :telephone, :email, :address, :postal_code, :city, :password);
      ");

            // On remplace les placeholders (optionnellement avec bindParam)
            $success = $query->execute([
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":telephone" => $telephone,
                ":email" => $email,
                ":address" => $address,
                ":postal_code" => $postal_code,
                ":city" => $city,
                ":password" => $password,
            ]);

            if ($success) {
                $this->redirect("login.php?register=successful");
            }
        }
    }

    /**
     * Méthode pour se connecter
     */
    public function loginUser()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $error = "Identifiants invalides. Merci de réessayer.";

            $email = $_POST["email_login"];
            $password = $_POST["password_login"];

            // 1ère étape: Vérifier en BDD si cet email existe
            // 2de étape: si l'email existe, vérifier le mot de passe
            $query = $this->pdo->query("SELECT * FROM dda_users WHERE email = '$email'");
            $query->setFetchMode(PDO::FETCH_CLASS, "User");
            $user = $query->fetch();

            if (!$user) return $error;

            // $matchPassword va vérifier le MDP, et nous retourner true ou false
            $matchPassword = password_verify($password, $user->getPassword());

            // Si l'email / mdp sont corrects, se connecter
            // Sinon afficher l'erreur

            if ($matchPassword) {
                // On enregistre notre utilisateur dans une session
                $_SESSION["okaz_logged_user"] = [
                    "id" => $user->getId(),
                    "role" => $user->getRole(),
                    "firstname" => $user->getFirstname(),
                    "lastname" => $user->getLastname()
                ];
                $this->redirect("shop.php");
            } else return $error;
        }
    }

    /**
     * Méthode pour déconnecter l'utilisateur
     */
    public function logoutUser()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Nous allons détruire notre session
            // et rediriger notre utilisateur vers la page de login
            unset($_SESSION["okaz_logged_user"]);
            session_destroy();
            $this->redirect("login.php");
        }
    }
    /**
     * Méthode pour modifier un utilisateur
     */
    public function updateUser()
    {
        $user = getLoggedUser();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "errorTelephone" => "",
                "errorTelephoneEmpty" => "",
                "errorPostal_code" => "",
                "errorPostal_codeEmpty" => "",
                "errorEmptyField" => "",

            ];

            // On stock chacun de nos inputs dans une variable
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $address = $_POST["address"];
            $telephone = $_POST["telephone"];
            $postal_code = $_POST["postal_code"];
            $city = $_POST["city"];

            if (!filter_var($postal_code, FILTER_VALIDATE_FLOAT)) {
                $data["errorPostal_code"] = "Merci de remplir un code postal valide";
            }
            if (!empty($telephone) && !filter_var($telephone, FILTER_VALIDATE_FLOAT)) {
                $data["errorTelephone"] = "Merci de remplir un numéro de téléphone valide";
            }
            if (empty($telephone)) {
                $data["errorTelephoneEmpty"] = "Merci de remplir votre numéro de téléphone";
            }
            if (empty($postal_code)) {
                $data["errorPostal_codeEmpty"] = "Merci de remplir votre code postal";
            }
            if (empty($firstname) || empty($lastname) || empty($address) || empty($postal_code) || empty($city)) {
                $data["errorEmptyField"] = "Merci de ne pas laisser de champ vide.";
            }


            // Si une erreur n'est pas vide (empty), c'est qu'on a une erreur
            // On retourne alors notre array $data, et on ne fait rien d'autre
            if (!empty($data["errorEmptyField"]) || !empty($data["errorTelephone"]) ||  !empty($data["errorPostal_code"])) {
                return $data;
            }

            // Si nous n'avons pas d'erreurs, nous pouvons traiter les données.
            // $firstname = htmlspecialchars($firstname); => filtrer les strings sous PHP8
            $firstname = htmlspecialchars($firstname);
            $lastname = htmlspecialchars($lastname);
            $address = htmlspecialchars($address);
            $postal_code = filter_var($postal_code, FILTER_SANITIZE_NUMBER_INT);
            $telephone = filter_var($telephone, FILTER_SANITIZE_NUMBER_INT);
            $city = htmlspecialchars($city);


            // On prépare notre requête SQL
            $query = $this->pdo->prepare("
        UPDATE `dda_users` SET
        firstname = :firstname,
        lastname = :lastname,
        telephone = :telephone,
        address = :address,
        postal_code = :postal_code,
        city = :city
        WHERE id = :id
      ");

            // On remplace les placeholders (optionnellement avec bindParam)
            $success = $query->execute([
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":telephone" => $telephone,
                ":address" => $address,
                ":postal_code" => $postal_code,
                ":city" => $city,
                ":id" => $user["id"],
            ]);

            if ($success) {
                $_SESSION["okaz_logged_user"] = [
                    "id" => $user["id"],
                    "role" => $user["role"],
                    "firstname" => $firstname,
                    "lastname" => $lastname
                ];
                if ($_SERVER["HTTP_REFERER"] == "http://localhost/okaz/modify_profile.php?id=fromdelivery") {
                    $this->redirect("delivery.php");
                } else {
                    $this->redirect("profile.php");
                }
            }
        }
    }
    /*
    * Méthode pour modifier le mot de passe
    */
    public function modifyPassword()
    {


        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "errorPassword" => "",
                "errorConfirm" => "",
            ];

            $current = $_POST["current"];
            $newPassword = $_POST["newPassword"];
            $confirm = $_POST["confirm"];

            // Nous allons vérifier si le mdp $current correspond
            // à celui présent en BDD
            $user = $this->searchUser();
            if (!password_verify($current, $user->getPassword())) {
                $data["errorPassword"] = "Le mot de passe n'est pas correct";
            }
            if ($newPassword !== $confirm) {
                $data["errorConfirm"] = "Les mots de passe ne correspondent pas";
            }

            if (!empty($data["errorPassword"]) || !empty($data["errorConfirm"])) {
                return $data;
            }

            if (password_verify($current, $user->getPassword()) && $newPassword === $confirm) {
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $query = $this->pdo->prepare("UPDATE dda_users SET password = :password");
                $success = $query->execute([":password" => $newPassword]);

                if ($success) $this->redirect("profile.php");
            }
            //    dd("Erreur dans la logique");
        }
    }

    public function registerContactForm()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $error = [
                "errorEmail" => "",
                "successfulRegister" => "",
            ];

            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error["errorEmail"] = "Merci de remplir un email valide";
                return $error;
            }

            $name = htmlspecialchars($name);
            $subject = htmlspecialchars($subject);
            $message = htmlspecialchars($message);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            $query = $this->pdo->prepare("INSERT INTO dda_contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
            $success = $query->execute([
                ":name" => $name,
                ":email" => $email,
                ":subject" => $subject,
                ":message" => $message,
            ]);

            if ($success) {
                $error["successfulRegister"] = "Votre message a bien été envoyé";
                return $error;
            }
        }
    }
}
