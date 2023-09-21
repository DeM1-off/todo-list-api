<?php

namespace App\Enums;
enum ResponseJson :string
{
  case DELETE = 'Задача видалена';
  case UNAUTHORIZED = 'Це не ваш запис';
}
