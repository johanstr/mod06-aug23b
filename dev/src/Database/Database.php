<?php

https://www.google.com/search?q=test&sca_esv=76e9a7c290e4c885&sca_upv=1&source=hp&ei=9DtUZtjHJvL-7_UPs8q50AE&iflsig=AL9hbdgAAAAAZlRKBHw523pzM88XD2cQa3b_HqnpOnRV&ved=0ahUKEwjYkeb-rK2GAxVy_7sIHTNlDhoQ4dUDCBc&uact=5&oq=test&gs_lp=Egdnd3Mtd2l6IgR0ZXN0MggQABiABBixAzIIEAAYgAQYsQMyBRAAGIAEMggQABiABBixAzIIEAAYgAQYsQMyCBAAGIAEGLEDMgUQABiABDILEAAYgAQYsQMYgwEyBRAAGIAEMggQABiABBixA0iSD1D7Blj-CXABeACQAQCYAUSgAfgBqgEBNLgBA8gBAPgBAZgCBaACigKoAgrCAgoQLhgDGOoCGI8BwgIKEAAYAxjqAhiPAcICERAuGIAEGLEDGNEDGIMBGMcBwgIOEC4YgAQYxwEYjgUYrwHCAg4QABiABBixAxiDARiKBcICDhAuGIAEGLEDGIMBGIoFwgIOEC4YgAQYsQMY0QMYxwHCAgsQLhiABBjRAxjHAcICCxAuGIAEGMcBGK8BwgIUEC4YgAQYsQMYgwEYxwEYigUYrwHCAgsQLhiABBixAxiDAZgDA5IHATWgB-Uo&sclient=gws-wiz

class Database
{
   private static string $dbhost = '127.0.0.1';
   private static string $dbname = '2324_wittekip';
   private static string $dbuser = 'root';
   private static string $dbpass = 'root';

   private static $dbConnection = null;
   private static $dbStatement  = null;


   private static function connect()
   {
      try {
         self::$dbConnection = new PDO(
            "mysql:host=".self::$dbhost.";dbname=".self::$dbname,
            self::$dbuser,
            self::$dbpass);
      } catch(PDOException $e) {

      }
   }

   public static function query(string $sql, array $placeholders = [])
   {
      if(is_null(self::$dbConnection))
         self::connect();

      self::$dbStatement = self::$dbConnection->prepare($sql);
      self::$dbStatement->execute($placeholders);
   }

   public static function getAll()
   {
      if(is_null(self::$dbConnection) || is_null(self::$dbStatement))
         return [];

      return self::$dbStatement->fetchAll(PDO::FETCH_ASSOC);
   }

   public static function get()
   {
      if(is_null(self::$dbConnection) || is_null(self::$dbStatement))
         return [];

      return self::$dbStatement->fetch(PDO::FETCH_ASSOC);
   }
}