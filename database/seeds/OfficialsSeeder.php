<?php

use App\Imports\ImportOfficials;
use App\Model\Barangay;
use App\Model\Official;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class OfficialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officials = [
            [1, 'RENATO', 'MENDOZA', 'BARIAS', 'Captain', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [2, 'MONTANO', 'QUINTAIN', 'DE GUZMAN', 'Councilor', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [3, 'GERTRUDEZ', 'YUMANG', 'CHAVEZ', 'Councilor', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [4, 'VICENTE', 'AGUILAR', 'SILVA', 'Councilor', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [5, 'ROLLY', 'ORUGA', 'PAZ', 'Councilor', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [6, 'RENATO', 'MENDOZA', 'BARIAS', 'Councilor', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [7, 'JOCELYN', 'CANILLAS', 'MANITO', 'Councilor', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [8, 'Arnie', 'Palijon', 'Mercado', 'SK Chairperson', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [9, 'MARJOLYN', 'REMETILLA', 'SILVA', 'Secretary', NULL, NULL, 1, 0, 1, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [10, 'REX', 'BAUTISTA', 'DUNGO', 'Captain', NULL, NULL, 1, 0, 2, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [11, 'GLEN', 'DUNGO', 'ALCANTARA', 'Councilor', NULL, NULL, 1, 0, 2, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [12, 'GORGONIA', 'DUNGO', 'TORALBA', 'Councilor', NULL, NULL, 1, 0, 2, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [13, 'JHONYVER', 'ORGANES', 'CONSIGRA', 'Councilor', NULL, NULL, 1, 0, 2, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [14, 'EDUARDO', 'SOTALBO', 'VALENDIA', 'Councilor', NULL, NULL, 1, 0, 2, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [15, 'CLARO', 'AMBALADA', 'ESTENOR', 'Councilor', NULL, NULL, 1, 0, 2, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [16, 'JAYSON', 'ALMARIO', 'DIEGO', 'SK Chairperson', NULL, NULL, 1, 0, 2, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [17, 'TERESA', 'PINEDA', 'NOLIA', 'Secretary', NULL, NULL, 1, 0, 2, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [18, 'FERMIN', 'ATIENZA', 'AGONIA', 'Captain', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [19, 'JENIFFER', 'GOCHANGCO', 'RAMILO', 'Councilor', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [20, 'RITCHIE', 'GONZALES', 'ALZONA', 'Councilor', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [21, 'DARLENE', 'JOYOSA', 'ECHON', 'Councilor', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [22, 'ERICKSON', 'AGONIA', 'CASTILLO', 'Councilor', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [23, 'NICASIO', 'CARINO', 'CAPISTRANO', 'Councilor', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [24, 'BRENDO', 'LAMUDOC', 'MEJIAS', 'Councilor', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [25, 'JASON', 'JOPIA', 'MEDIARITO', 'SK Chairperson', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [26, 'MA. REALYN', 'CARUDAN', 'DE LIMA', 'Secretary', NULL, NULL, 1, 0, 3, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [27, 'JOAN PAMELA', 'MAGDATO', 'BABATID', 'Captain', NULL, NULL, 1, 0, 4, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [28, 'MARIELLE', 'F', 'BAGUI', 'Councilor', NULL, NULL, 1, 0, 4, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [29, 'ALBERTO', 'M', 'PEREZ', 'Councilor', NULL, NULL, 1, 0, 4, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [30, 'JOHN RAYMOND', '', 'PAGCALIWAGAN', 'Councilor', NULL, NULL, 1, 0, 4, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [31, 'BERNIE', 'G', 'LARA', 'Councilor', NULL, NULL, 1, 0, 4, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [32, 'JOWI LEE', 'PEREZ', 'LEGASPI', 'SK Chairperson', NULL, NULL, 1, 0, 4, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [33, 'RAINERIO', 'AFALLA', 'GUBUAT', 'Secretary', NULL, NULL, 1, 0, 4, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [34, 'RUEL', 'FLORES', 'PANERGAYO', 'Captain', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [35, 'LEONORA', 'A', 'ALCANTARA', 'Councilor', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [36, 'IRENE', 'VARGAS', 'ROMERO', 'Councilor', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [37, 'AVELINA', 'DEQUITO', 'ALCANTARA', 'Councilor', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [38, 'NANCY', 'MARANAN', 'BANAYO', 'Councilor', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [39, 'PEDRO', 'GABIONZA', 'PARADO', 'Councilor', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [40, 'BENITO', 'ANIVES', 'BATITIS', 'Councilor', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [41, 'JUNE ALDRIN', 'BARCELONA', 'GUNIO', 'SK Chairperson', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [42, 'RHONNAH', 'V', 'PINOHERMOSO', 'Secretary', NULL, NULL, 1, 0, 5, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [43, 'KENNETH', 'BRION', 'KRAFT', 'Captain', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [44, 'ROBERTO', 'MAGAPI', 'MALITIC', 'Councilor', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [45, 'ENDA', 'MOLE', 'AGUASON', 'Councilor', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [46, 'GILES LINDLEY', 'DAVID', 'MEDEL', 'Councilor', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [47, 'IVVY', 'BAARDE', 'ALMARIO', 'Councilor', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [48, 'FAYE FATIMA', 'CAPISTRANO', 'LANORIO', 'Councilor', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [49, 'UBALDO', 'ACBONG', 'ALMARIO', 'Councilor', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [50, 'JACINTO', 'PAURA', 'CALONG CALONG', 'Councilor', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [51, 'NINA PATRICE', 'YU', 'CORCOLON', 'SK Chairperson', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [52, 'ARNOLD', 'GARCIA', 'CHAVEZ', 'Secretary', NULL, NULL, 1, 0, 6, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [53, 'NESTOR', 'MALIBIRAN', 'OCAMPO', 'Captain', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [54, 'MARIA LUISA', 'FORMENTO', 'DELA PENA', 'Councilor', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [55, 'VALENTIN', 'TUICO', 'MEDALLA', 'Councilor', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [56, 'LORENZA', 'CABANEROS', 'EXCONDE', 'Councilor', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [57, 'FLORENAD', 'MAGAPI', 'GATCHALLIAN', 'Councilor', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [58, 'FLORENAD', 'MAGAPI', 'GATCHALLIAN', 'Councilor', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [59, 'VALERIANA', 'ORUGA', 'CORONADO', 'Councilor', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [60, 'RODERICK', 'CNATA', 'DELA CRUZ', 'Councilor', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [61, 'GABRIEL JOHN', 'MASANGA', 'CORONADO', 'SK Chairperson', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [62, 'JENALYN', 'JUMINTO', 'TERRIBLE', 'Secretary', NULL, NULL, 1, 0, 7, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [63, 'MAC JEFFERSON', 'TORTTE', 'ROXAS', 'Captain', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [64, 'ANDREW', 'DIAZ', 'RAMOS', 'Councilor', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [65, 'NICANOR', 'PEREZ', 'ANDAYA', 'Councilor', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [66, 'CECILIA', 'CHAVEZ', 'LANDICHO', 'Councilor', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [67, 'ALISINO', 'LANDICHO', 'ANGELES', 'Councilor', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [68, 'ROLAND', 'RAMOS', 'SABALLA', 'Councilor', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [69, 'RICO', 'CADAC', 'ROXAS', 'Councilor', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [70, 'HERMAN', 'ANGELES', 'MALABANAN', 'Councilor', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [71, 'ROSS MATTHEW', 'ANGELES', 'OMEGA', 'SK Chairperson', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [72, 'SHARLENE', 'NOTORIO', 'MALOLES', 'Secretary', NULL, NULL, 1, 0, 8, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [73, 'ROMEO', 'JARON', 'ALVAREZ', 'Captain', NULL, NULL, 1, 0, 9, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [74, 'RICARDO', 'PASCO', 'PITOGO', 'Councilor', NULL, NULL, 1, 0, 9, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [75, 'EDUARDO', 'MENDOZA', 'MAGPANTAY', 'Councilor', NULL, NULL, 1, 0, 9, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [76, 'RODEL', 'CUEVAS', 'BONDAD', 'Councilor', NULL, NULL, 1, 0, 9, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [77, 'VILMA', 'FALLARICUNA', 'CANAMA', 'Councilor', NULL, NULL, 1, 0, 9, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [78, 'DANTE', 'ILAGAN', 'BUSTAMANTE', 'Councilor', NULL, NULL, 1, 0, 9, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [79, 'NINO', 'TAMESIS', 'JARON', 'SK Chairperson', NULL, NULL, 1, 0, 9, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [80, 'LORENZO', 'BASCO', 'BARIA', 'Secretary', NULL, NULL, 1, 0, 9, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [81, 'DARWIN', 'PUKYUTAN', 'GUEVARRA', 'Captain', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [82, 'JAYCEE', 'NOVILLOS', 'MANALO', 'Councilor', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [83, 'EUGENIA', 'GUEVARRA', 'HERNANDEZ', 'Councilor', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [84, 'THELMA', 'MABILANGAN', 'DELA CRUZ', 'Councilor', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [85, 'EDGAR', 'VILLANUEVA', 'VELASCO', 'Councilor', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [86, 'MANOLITO', 'MALIKSI', 'REYES', 'Councilor', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [87, 'CARINA', 'BIGAL', 'OLAN', 'Councilor', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [88, 'SOFRONIO', 'GUEVARRA', 'DE CASTRO', 'Councilor', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [89, 'REMIGIO', 'PADAL', 'LAZAGA', 'SK Chairperson', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [90, 'SHERRYLIN', 'PUNZALAN', 'RICAFORT', 'Secretary', NULL, NULL, 1, 0, 10, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [91, 'ERNESTO', 'GONZALES', 'CARPIO', 'Captain', NULL, NULL, 1, 0, 11, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [92, 'ALBERTO', 'VILLAMIN', 'CADAGAN', 'Councilor', NULL, NULL, 1, 0, 11, '2023-09-09 21:32:28', '2023-09-09 21:32:28'],
            [93, 'ZENAIDA', 'VILLANUEVA', 'ZARATE', 'Councilor', NULL, NULL, 1, 0, 11, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [94, 'RENATO', 'FAJARDO', 'VILLANUEVA', 'Councilor', NULL, NULL, 1, 0, 11, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [95, 'LEONORA', 'ALCANTARA', 'AMPARO', 'Councilor', NULL, NULL, 1, 0, 11, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [96, 'MACARIO', 'ESGUERRA', 'LANTICAN', 'Councilor', NULL, NULL, 1, 0, 11, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [97, 'JOHN LOID', 'BELEN', 'BECINA', 'SK Chairperson', NULL, NULL, 1, 0, 11, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [98, 'MARICEL', 'CRISTOBAL', 'MENESES', 'Secretary', NULL, NULL, 1, 0, 11, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [99, 'RICARDO', 'SALAZAR', 'CUETO', 'Captain', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [100, 'DARIO', 'CUETO', 'LEUZ', 'Councilor', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [101, 'MARIO', 'HIDALGO', 'LLANTO', 'Councilor', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [102, 'PERLA', 'RESEBA', 'VILLARUZ', 'Councilor', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [103, 'ARNOLD', 'LEUZ', 'DELA RUEDA', 'Councilor', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [104, 'TEOFILO', 'ALCANTARA', 'UMALI', 'Councilor', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [105, 'PEDRITO', 'SABA', 'OLGADO', 'Councilor', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [106, 'JANINE SHAIRA ANN', 'AMANTE', 'ROBILON', 'SK Chairperson', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [107, 'LOREN', 'MAYO', 'LAGRADANTE', 'Secretary', NULL, NULL, 1, 0, 12, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [108, 'FRANCISCO', 'GUEVARRA', 'AVERION', 'Captain', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [109, 'HERMAN', 'MARQUEZ', 'SANDRO', 'Councilor', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [110, 'LEONILA', 'TORRIZO', 'CORPUZ', 'Councilor', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [111, 'MARIO', 'RUBANG', 'GALLAJONES', 'Councilor', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [112, 'NOLASCO', 'URI', 'FLORES', 'Councilor', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [113, 'GENICKO ALEXIS', 'CATAHAN', 'GUEVARRA', 'Councilor', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [114, 'ERIC', 'ERA', 'GOLLOSO', 'Councilor', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [115, 'NICASIO', 'REYES', 'ARIDA', 'Councilor', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [116, 'JAY R', 'MENDOZA', 'FLORES', 'SK Chairperson', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [117, 'HAIDEE', 'MENDOZA', 'PALICPIC', 'Secretary', NULL, NULL, 1, 0, 13, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [118, 'KASSEL CASSANDRA', 'MAGTIBAY', 'KRAFT', 'Captain', NULL, NULL, 1, 0, 14, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [119, 'ANTHONY JOHN', 'MANZANERO', 'LIBED', 'Councilor', NULL, NULL, 1, 0, 14, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [120, 'ROMANO', 'MALIGALIG', 'ALBAN', 'Councilor', NULL, NULL, 1, 0, 14, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [121, 'ELSA', 'MEDILO', 'DEL ROSARIO', 'Councilor', NULL, NULL, 1, 0, 14, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [122, 'MARK DAVID', 'ARCA', 'CABISUELAS', 'SK Chairperson', NULL, NULL, 1, 0, 14, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [123, 'ELLA SHANE', 'SUAZO', 'LOPEZ', 'Secretary', NULL, NULL, 1, 0, 14, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [124, 'VIRGILIO', 'MENDOZA', 'NASAYAW', 'Captain', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [125, 'LEONARDO', 'TANINGCO', 'CAMARGO', 'Councilor', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [126, 'MANALO', 'BELO', 'ESCUETA', 'Councilor', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [127, 'ROSE MARIE', 'RAMIREZ', 'TOBIAS', 'Councilor', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [128, 'CHARLIE', 'ACUNA', 'RAMIREZ', 'Councilor', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [129, 'ARNEL', 'ALCANTARA', 'BONGON', 'Councilor', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [130, 'REYNALDO', 'BISMONTE', 'SUMUNDO', 'Councilor', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [131, 'JERICO', 'GONZALES', 'ALMARIO', 'SK Chairperson', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [132, 'ESMERANDA', 'ALCANTARA', 'PAJE', 'Secretary', NULL, NULL, 1, 0, 15, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [133, 'ROMMEL', 'HUBERIT', 'BELANO', 'Captain', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [134, 'PABLO', 'LANORIO', 'MARIKIT', 'Councilor', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [135, 'ROSITA', 'MEDINA', 'PINEDA', 'Councilor', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [136, 'SIMEON', 'ARESTADO', 'VILLEGAS', 'Councilor', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:29', '2023-09-09 21:32:29'],
            [137, 'RICO', 'JAURIGUE', 'MAGNO', 'Councilor', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [138, 'ROY', 'LANORIO', 'MARIKIT', 'Councilor', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [139, 'MELCHOR KENNETH', 'DORADO', 'MALPICA', 'Councilor', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [140, 'MAXIMA', 'TALABIS', 'CATAPANG', 'Councilor', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [141, 'MIKAELLA', 'CATIPON', 'MAGNO', 'SK Chairperson', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [142, 'CHERRY', 'DE VERA', 'VILLANUEVA', 'Secretary', NULL, NULL, 1, 0, 16, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [143, 'JOEL', 'LANORIO', 'LUDOR', 'Captain', NULL, NULL, 1, 0, 17, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [144, 'DOMINGO', 'BANAGA', 'POCUA', 'Councilor', NULL, NULL, 1, 0, 17, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [145, 'ROBERTO', 'FORMELOZA', 'BARIAS', 'Councilor', NULL, NULL, 1, 0, 17, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [146, 'ROWENA', 'ESTUITA', 'ALAMANTA', 'Councilor', NULL, NULL, 1, 0, 17, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [147, 'NIKKA MARITONI', 'RAMIREZ', 'MICO', 'SK Chairperson', NULL, NULL, 1, 0, 17, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
            [148, 'ANALIZA', 'LARONA', 'MANABAT', 'Secretary', NULL, NULL, 1, 0, 17, '2023-09-09 21:32:30', '2023-09-09 21:32:30'],
        ];
        foreach ($officials as $official) {
            Official::create([
                'first_name' => $official[1],
                'middle_name' => $official[2],
                'last_name' => $official[3],
                'position' => $official[4],
                'year_id' => $official[7],
                'barangay_id' => $official[9],
            ]);
        }
    }
}
