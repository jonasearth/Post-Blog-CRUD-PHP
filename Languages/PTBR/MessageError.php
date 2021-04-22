<?php

namespace Fnatic\Languages\PTBR;


class MessageError
{
  /**
   * Mensagens genéricas
   */

  const NOT_RESULT_FOUND  = "Nenhum resultado encontrado!";
  const CREATE_ERROR = "Error ao adicionar!";
  const UPDATE_ERROR = "Error ao atualizar!";
  const DELETE_ERROR = "Error ao excluir!";
  const PERM_FAIL  = "Você não tem permição!";
  const INVALID_FIELDS = "Verifique os campos e tente novamente!";
  const INVALID_CRED = "Login ou senha inválidos!";


  /**
   * Mensagens Post
   */

  const POST_TITLE_LENGTH_ERROR = "Titulo deve ter mais de 6 digitos!";
  const POST_BODY_LENGTH_ERROR = "Corpo do post não pode ter menos que 20 caracteres!";
  const POST_AUTHOR_LENGTH_ERROR = "O author não pode ser vazio";
  const POST_URL_ALREADY_USED = "Url já está em uso!";
}
