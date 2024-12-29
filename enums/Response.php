<?php

enum Response: int
{
    case PageNotFound = 404;
    case Forbidden = 403;
    case ServerError = 500;
}