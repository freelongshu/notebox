<?php

abstract class DataModel
{
    /**
     * 数据表中的`is_deleted`字段常量值
     */
    const NOT_DELETED = 0; //未删除
    const IS_DELETED = 1; //已删除

    /**
     * 数据表中的`is_banned`字段常量值
     */
    const NOT_BANNED = 0;
    const IS_BANNED = 1;

    /**
     * 数据表中的`is_verified`字段常量值
     */
    const NOT_VERIFIED = 0;
    const IS_VERIFIED = 1;

    /**
     * 数据表中的`audit_status`字段常量值
     */
    const AUDIT_NEEDED = 0; //待审核
    const AUDIT_PASSED = 1; //审核通过
    const AUDIT_FAILED = 2; //审核未通过
}