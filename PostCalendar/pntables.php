<?php
/**
 * @package     PostCalendar
 * @author      $Author$
 * @link        $HeadURL$
 * @version     $Id$
 * @copyright   Copyright (c) 2002, The PostCalendar Team
 * @copyright   Copyright (c) 2009, Craig Heydenburg, Sound Web Development
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * This function is called internally by the core whenever the module is
 * loaded.  It adds in the information
 */
function postcalendar_pntables()
{
    // Initialise table array
    $pntable = array();

    $pc_events = DBUtil::getLimitedTablename('postcalendar_events');
    $pntable['postcalendar_events'] = $pc_events;
    $pntable['postcalendar_events_column'] = array(
                    'eid'         => 'pc_eid',
                    'catid'       => 'pc_catid',
                    'aid'         => 'pc_aid',
                    'title'       => 'pc_title',
                    'time'        => 'pc_time',
                    'hometext'    => 'pc_hometext',
                    'comments'    => 'pc_comments',
                    'counter'     => 'pc_counter',
                    'topic'       => 'pc_topic',
                    'informant'   => 'pc_informant',
                    'eventDate'   => 'pc_eventDate',
                    'duration'    => 'pc_duration',
                    'endDate'     => 'pc_endDate',
                    'recurrtype'  => 'pc_recurrtype',
                    'recurrspec'  => 'pc_recurrspec',
                    'recurrfreq'  => 'pc_recurrfreq',
                    'startTime'   => 'pc_startTime',
                    'endTime'     => 'pc_endTime',
                    'alldayevent' => 'pc_alldayevent',
                    'location'    => 'pc_location',
                    'conttel'     => 'pc_conttel',
                    'contname'    => 'pc_contname',
                    'contemail'   => 'pc_contemail',
                    'website'     => 'pc_website',
                    'fee'         => 'pc_fee',
                    'eventstatus' => 'pc_eventstatus',
                    'sharing'     => 'pc_sharing',
                    'language'    => 'pc_language',
                    'meeting_id'  => 'pc_meeting_id');
    $pntable['postcalendar_events_column_def'] = array(
                    'eid'         => 'I(11) UNSIGNED AUTO PRIMARY',      // int(11) unsigned NOT NULL auto_increment
                    'catid'       => 'I NOTNULL DEFAULT 0',              // int(11) NOT NULL default 0
                    'aid'         => 'C(30) NOTNULL DEFAULT \'\'',       // varchar(30) NOT NULL default ''
                    'title'       => 'C(150) DEFAULT \'\'',              // varchar(150) default ''
                    'time'        => 'T',                                // datetime
                    'hometext'    => 'X DEFAULT \'\'',                   // text default ''
                    'comments'    => 'I DEFAULT 0',                      // int(11) default 0
                    'counter'     => 'I4(8) UNSIGNED DEFAULT 0',         // mediumint(8) unsigned default 0
                    'topic'       => 'I(3) NOTNULL DEFAULT 1',           // int(3) NOT NULL default 1
                    'informant'   => 'C(20) NOTNULL DEFAULT \'\'',       // varchar(20) NOT NULL default ''
                    'eventDate'   => 'D NOTNULL DEFAULT \'0000-00-00\'', // date NOT NULL default '0000-00-00'
                    'duration'    => 'I8(20) NOTNULL DEFAULT 0',         // bigint(20) NOT NULL default 0
                    'endDate'     => 'D NOTNULL DEFAULT \'0000-00-00\'', // date NOT NULL default '0000-00-00'
                    'recurrtype'  => 'I(1) NOTNULL DEFAULT 0',           // int(1) NOT NULL default 0
                    'recurrspec'  => 'X DEFAULT \'\'',                   // text default ''
                    'recurrfreq'  => 'I(3) NOTNULL DEFAULT 0',           // int(3) NOT NULL default 0
                    'startTime'   => 'C(8) DEFAULT \'00:00:00\'',        // time (MySQL only, so now defined as varchar2)
                    'endTime'     => 'C(8) DEFAULT \'00:00:00\'',        // time (MySQL only, so now defined as varchar2)
                    'alldayevent' => 'I(1) NOTNULL DEFAULT 0',           // int(1) NOT NULL default 0
                    'location'    => 'X',                                // text default ''
                    'conttel'     => 'C(50) DEFAULT \'\'',               // varchar(50) default ''
                    'contname'    => 'C(50) DEFAULT \'\'',               // varchar(50) default ''
                    'contemail'   => 'C(255) DEFAULT \'\'',              // varchar(255) default ''
                    'website'     => 'C(255) DEFAULT \'\'',              // varchar(255) default ''
                    'fee'         => 'C(50) DEFAULT \'\'',               // varchar(50) default ''
                    'eventstatus' => 'I NOTNULL DEFAULT 0',              // int(11) NOT NULL default 0
                    'sharing'     => 'I NOTNULL DEFAULT 0',              // int(11) NOT NULL default 0
                    'language'    => 'C(30) DEFAULT \'\'',               // varchar(30) default ''
                    'meeting_id'  => 'I DEFAULT 0');                     // int(11) NULL default 0
    $pntable['postcalendar_events_column_idx'] = array(
                    'basic_event' => array(
                                    'catid',
                                    'aid',
                                    'eventDate',
                                    'endDate',
                                    'eventstatus',
                                    'sharing',
                                    'topic'));

    // @since version 3.1
    // new category table
    $pc_categories = DBUtil::getLimitedTablename('postcalendar_categories');
    $pntable['postcalendar_categories'] = $pc_categories;
    $pntable['postcalendar_categories_column'] = array(
                    'catid'    => 'pc_catid',
                    'catname'  => 'pc_catname',
                    'catcolor' => 'pc_catcolor',
                    'catdesc'  => 'pc_catdesc');
    $pntable['postcalendar_categories_column_def'] = array(
                    'catid'    => 'I(11) UNSIGNED AUTO PRIMARY',          // int(11) unsigned NOT NULL auto_increment
                    'catname'  => 'C(100) NOTNULL DEFAULT \'Undefined\'', // varchar(100) NOT NULL default 'Undefined'
                    'catcolor' => 'C(50) NOTNULL DEFAULT \'#FF0000\'',    // varchar(50) NOT NULL default '#FF0000'
                    'catdesc'  => 'X');                                   //  text default ''
    $pntable['postcalendar_categories_column_idx'] = array('basic_cat' => array('catname', 'catcolor'));

    // INSERTED FOR VERSION 5.0.1 C HEYDENBURG
    // this is for compatibility with the old Topics Module which has been superceeded
    // in Zikula by the Categories module....
    // This is needed for upgraded sites (from PN 764 -> ZK1+)

    // this is a nasty hack, probably wont work with DBUtil,
    // so for future reference, remove the 'tid' line or maybe if this
    // module is updated to use DBUtil, change references to the id to be tid rather
    // than topicid (better idea) - drak
    $pntable['topics'] = pnConfigGetVar('prefix') . '_topics';
    $pntable['topics_column'] = array(
                    'topicid' => 'pn_topicid',
                    'tid' => 'pn_topicid',
                    'topicname' => 'pn_topicname',
                    'topicimage' => 'pn_topicimage',
                    'topictext' => 'pn_topictext',
                    'counter' => 'pn_counter');

    $pntable['related'] = pnConfigGetVar('prefix') . '_related';
    $pntable['related_column'] = array('rid' => 'pn_rid', 'tid' => 'pn_tid', 'name' => 'pn_name', 'url' => 'pn_url');

    return $pntable;
}
