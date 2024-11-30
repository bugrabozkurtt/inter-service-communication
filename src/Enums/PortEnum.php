<?php

namespace BugraBozkurt\InterServiceCommunication\Enums;

enum PortEnum: int
{
    case USER = 8080;
    case AUTH = 8081;
    case PRODUCT = 8082;
    case CAMPAIGN = 8083;
    case CART = 8084;
    case ORDER = 8085;
    case PAYMENT = 8086;
    case INVOICE = 8087;
}
