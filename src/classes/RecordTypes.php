<?php
/**
 * Created by PhpStorm.
 * User: bennet
 * Date: 02.10.18
 * Time: 14:16
 */

namespace BIND\classes;


use MyCLabs\Enum\Enum;

class RecordTypes extends Enum {

    const __default = self::NONE;

    private const NONE = 0;
    private const A = 1;
    private const NS = 2;
    private const MD = 3;
    private const MF = 4;
    private const CNAME = 5;
    private const SOA = 6;
    private const MB = 7;
    private const MG = 8;
    private const MR = 9;
    private const NULL = 10;
    private const WKS = 11;
    private const PTR = 12;
    private const HINFO = 13;
    private const MINFO = 14;
    private const MX = 15;
    private const TXT = 16;
    private const RP = 17;
    private const AFSDB = 18;
    private const X25 = 19;
    private const ISDN = 20;
    private const RT = 21;
    private const NSAP = 22;
    private const NSAP_PTR = 23;
    private const SIG = 24;
    private const KEY = 25;
    private const PX = 26;
    private const GPOS = 27;
    private const AAAA = 28;
    private const LOC = 29;
    private const NXT = 30;
    private const SRV = 33;
    private const NAPTR = 35;
    private const KX = 36;
    private const CERT = 37;
    private const A6 = 38;
    private const DNAME = 39;
    private const OPT = 41;
    private const APL = 42;
    private const DS = 43;
    private const SSHFP = 44;
    private const IPSECKEY = 45;
    private const RRSIG = 46;
    private const NSEC = 47;
    private const DNSKEY = 48;
    private const DHCID = 49;
    private const NSEC3 = 50;
    private const NSEC3PARAM = 51;
    private const TLSA = 52;
    private const HIP = 55;
    private const CDS = 59;
    private const CDNSKEY = 60;
    private const CSYNC = 62;
    private const SPF = 99;
    private const UNSPEC = 103;
    private const EUI48 = 108;
    private const EUI64 = 109;
    private const TKEY = 249;
    private const TSIG = 250;
    private const IXFR = 251;
    private const AXFR = 252;
    private const MAILB = 253;
    private const MAILA = 254;
    private const ANY = 255;
    private const URI = 256;
    private const CAA = 257;
    private const AVC = 258;
    private const TA = 32768;
    private const DLV = 32769;
}