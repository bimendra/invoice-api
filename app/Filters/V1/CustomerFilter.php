<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter {
  protected $safeParams = [
    'name'        =>    ['eq'],
    'type'        =>    ['eq'],
    'email'       =>    ['eq'],
    'address'     =>    ['eq'],
    'city'        =>    ['eq'],
    'state'       =>    ['eq'],
    'postCode'    =>    ['eq', 'gt', 'lt']
  ];

  protected $columnMap = [
    'postCode'    =>    'post_code'
  ];

  protected $operatorMap = [
    'eq'      =>      '=',
    'lt'      =>      '<',
    'lte'     =>      '<=',
    'gt'      =>      '>',
    'gte'     =>      '>=',
  ];
}