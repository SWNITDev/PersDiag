<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            'question_text' => 'Arbeitsorganisation',
            'question_description' => 'Der/die Mitarbeiter*in gestaltet seine/ihre Arbeitsabläufe strukturiert und effizient. Merkmale einer guten Arbeitsorganisation sind z.B. die pünktliche Abgabe von Aufgaben, die richtige Prioritätensetzung und auch ein aufgeräumter Arbeitsplatz.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Kundenorientierung',
            'question_description' => 'Die Bedürfnisse der Kundschaft werden ernst genommen und berücksichtigt. Der/die Mitarbeiter*in ist stets freundlich und kann Auskunft geben.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Arbeitseffizienz',
            'question_description' => 'Der/die Mitarbeiter*in arbeitet dann effizient, wenn ein Ziel mit einem möglichst geringen Einsatz oder mit einem bestimmten Einsatz ein möglichst großer Ertrag erreicht wird. Er/sie setzt Prioritäten richtig und vermeidet u.a. Multitasking, um fokussiert zu bleiben.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Organisationsfähigkeit',
            'question_description' => 'Der/die Mitarbeiter*in kann methodisches Wissen mit Tatkraft und Engagement umsetzen. Er/sie weiß, wie man Prioritäten setzt, verschiedene Arbeitsaufgaben miteinander koordiniert und in eine sinnvolle Abfolge bringt.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Arbeitssorgfalt',
            'question_description' => 'Der/die Mitarbeiter*in ist gründlich, zuverlässig und termintreu. Er/sie arbeitet gewissenhaft, zielgerichtet, aufmerksam und detailliert.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Fachkompetenz',
            'question_description' => 'Der/die Mitarbeiter*in kann fachbezogenes und fachübergreifendes Wissen in der Praxis selbstständig und eigenverantwortlich anwenden. Er/sie kann das Wissen auch an andere weitergeben.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Verhandlungskompetenz',
            'question_description' => 'Der/die Mitarbeiter*in definiert und kommuniziert das eigene Ziel, erkennt und berücksichtigt das Interesse des/der Verhandlungspartners/-partnerin. Er/sie kann Konflikte sachlich und konstruktiv lösen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Teamfähigkeit',
            'question_description' => 'Der/die Mitarbeiter*in zeigt Bereitschaft und Fähigkeit, in einer Gruppe zu arbeiten, Meinungen und Gedanken anderer weiterzuentwickeln und sich auf Gruppenprozesse einzulassen. Er/sie bringt seine Ideen in Gruppen mit ein und kann gemeinsam mit anderen die gesetzten Ziele erreichen und Problemlösungen finden.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Kommunikationsfähigkeit',
            'question_description' => 'Der/die Mitarbeiter*in kann anderen zuhören. Er/sie ist fähig, mündliche und schriftliche Informationen mit hoher Verständlichkeit zu gestalten und weiterzugeben. Bei Irritationen oder Meinungsverschiedenheiten kann er/sie bewusst innehalten und respektvoll reagieren.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Zuverlässigkeit',
            'question_description' => 'Der/die Mitarbeiter*in steht zu den von ihm/ihr getroffenen Absprachen und erfüllt diese gewissenhaft und pünktlich. Andere können sich auf sein/ihr Wort verlassen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Kritikfähigkeit',
            'question_description' => 'Sachlich formulierte und gerechtfertigte Kritik anzunehmen, ist für den/die Mitarbeiter*in kein Problem. Er/sie scheut sich nicht vor kritischen Gesprächen und hört währenddessen aufmerksam zu, lernt aus seinen Fehlern und möchte seine Fähigkeiten verbessern. Er/sie kann sachliche Kritik äußern und achtet darauf, niemanden zu verletzen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Konfliktfähigkeit',
            'question_description' => 'Der/die Mitarbeiter*in kann aufkommende Konflikte erkennen und versucht, diese vorab zu vermeiden oder abzuschwächen. Er/sie kann Konflikte ruhig und konstruktiv bewältigen, Lösungen oder Kompromisse finden und Argumente nicht persönlich nehmen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Fähigkeit zur Selbstreflexion',
            'question_description' => 'Der/die Mitarbeiter*in kann sich selbst ganzheitlich betrachten, inklusive aller Gedanken, Emotionen und Handlungen. Er/sie analysiert und hinterfragt das eigene Handeln mit dem Ziel, mehr über sich herauszufinden. Kritik wird als Chance zur Weiterentwicklung angesehen und nach Rückmeldungen wird eigenständig gefragt.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Verantwortungsbewusstsein',
            'question_description' => 'Der/die Mitarbeiter*in erfüllt seine Pflichten, weil ihm die Auswirkungen des eigenen Handels auf sich selbst und auf andere bewusst ist. Er/sie behält Termine, Deadlines und Aufgaben im Blick und kümmert sich eigenverantwortlich darum, dass alles problemlos verläuft.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Interkulturelle Kompetenz',
            'question_description' => 'Der/die Mitarbeiter*in kommt mit Menschen zurecht, die andere kulturelle Hintergründe haben. Er/sie verhält sich respektvoll und hat Verständnis für die Bräuche und Sitten anderer Kulturen. Er/sie achtet sowohl auf verbale als auch auf nonverbale Kommunikation und kann problemlos mit Menschen anderer Kulturen arbeiten.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Belastbarkeit',
            'question_description' => 'Der/die Mitarbeiter*in kann unter (schweren) seelischen, sozialen und körperlichen Anspannungen sowie bei hoher Arbeitsbelastung weitgehend Fehlreaktionen vermeiden und zielorientiert, kontrolliert und sachlich handeln. Der Stress wird durch eine geeignete Aktivität, wie z.B. Sport, abgebaut.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Engagement-Bereitschaft',
            'question_description' => 'Der/die Mitarbeiter*in investiert ein angemessenes Maß an Energie, um gute Ergebnisse zu erzielen und SWN voranzubringen. Er/sie hilft Kolleg*innen, die Unterstützung brauchen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Leistungsbereitschaft',
            'question_description' => 'Der/die Mitarbeiter*in ist motiviert, sein/ihr psychisches und physisches Leistungsvermögen eigenständig einzubringen, um erforderliche Aufgaben zu erledigen, sich neue Fähigkeiten anzueignen und angestrebte Ziele zu erreichen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Lernbereitschaft',
            'question_description' => 'Der/die Mitarbeiter*in ist bereit, fehlendes fachliches und methodisches Wissen, tätigkeitsspezifische Qualifikationen und Erfahrungen durch entsprechende Weiterbildungsmaßnahmen zu erwerben. Er/sie ist Neuem gegenüber aufgeschlossen und lernt aus Misserfolgen und Erfolgen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Innovations- und Veränderungskompetenz',
            'question_description' => 'Der/die Mitarbeiter*in kann neue Ideen, innovative Ansätze und Verbesserungen wahrnehmen, äußern, vorantreiben und diese dann in nutzbringende Prozesse, Produkte oder Dienstleistungen umsetzen. Er/sie sieht Veränderungen als Chancen für die Zukunft.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Vorbildfunktion',
            'question_description' => 'Die Führungskraft lebt das Leitbild und die Führungsprinzipien von SWN vor. Er/sie entwickelt sich kontinuierlich weiter und kennt ihre eigenen Schwächen und Stärken und gesteht Fehler ein. Er/sie schafft angemessene Rahmenbedingungen und gibt den Mitarbeitenden ehrliches und direktes Feedback, verhält sich aber immer wertschätzend und motivierend.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Richtig delegieren',
            'question_description' => 'Die Führungskraft gibt Aufgaben und Verantwortung an Mitarbeiter*innen ab. Er/sie kennt die Fähigkeiten der Mitarbeitenden und vertraut auf eine zuverlässige Bearbeitung der Aufgaben durch andere.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Motivieren',
            'question_description' => 'Eine Führungskraft kann die Mitarbeiter*innen auf verschiedene Weise motivieren. Die Motivation kann durch Lob, Anerkennung, Feedback, Wertschätzung, transparente Kommunikation, Ausbauen von Stärken, Stärken der emotionalen Bindung oder auch durch monetäre Leistungen erfolgen. Er/sie begeistert außerdem andere von seinen/ihren Ideen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Ziele besprechen',
            'question_description' => 'Die Führungskraft bespricht kurz- und langfristige Ziele mit allen betroffenen Mitarbeitenden und kommuniziert diese immer transparent.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Ergebnisorientiert',
            'question_description' => 'Die Führungskraft arbeitet mit dem eigenen Wissen, Erfahrungen und fachlichen sowie methodischen Fähigkeiten auf ein zu erzielendes, vorgegebenes oder selbstgesetztes Ergebnis hin. Das Ziel ist anspruchsvoll, aber erreichbar und wird nicht aus den Augen verloren.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Informationsfluss',
            'question_description' => 'Die Führungskraft stellt den Informationsfluss von oben nach unten und andersherum und an den einzelnen Schnittstellen sicher. Das heißt, wichtige Informationen werden korrekt und zeitnah an den/die entsprechende*n Empfänger*in weitergegeben.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Coach',
            'question_description' => 'Eine Führungskraft ist dann ein Coach, wenn er/sie den Mitarbeitenden spezielle Methoden oder Selbstkompetenzen vermittelt oder ihnen Rückmeldung zu Verhaltensweisen und zur Wirkung im Arbeitsalltag gibt. Er/sie unterstützt die Mitarbeitenden, gibt ihnen Feedback und versucht eine positive Fehlerkultur zu schaffen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Rahmenbedingungen schaffen',
            'question_description' => 'Die Führungskraft hält seinen/ihren Mitarbeitenden den Rücken frei und ermöglicht das eigenständige Arbeiten. Wird ein/e Mitarbeiter*in z.B. durch etwas von der Arbeit abgehalten, so kümmert sich die Führungskraft um bessere Bedingungen.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Vertrauen',
            'question_description' => 'Vertrauen kann man auf unterschiedliche Weise gewinnen: die Führungskraft ist in allen Angelegenheiten transparent oder er/sie gibt den Mitarbeitenden Handlungsspielraum, verspricht nur das, was auch eingehalten werden kann oder zeigt Interesse an Mitmenschen und vertraut ihnen auch.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Verbindlichkeit',
            'question_description' => 'Die Führungskraft steht zu seinem/ihrem Wort. Er/sie verfolgt den Grundsatz „Sagen, was man tut und tun, was man sagt“. Für die Mitarbeitenden ist er/sie berechenbar.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Digitale/hybride Kompetenz',
            'question_description' => 'Die Führungskraft verwendet verschiedene Tools (für Home-Office und Büro) für die Zusammenarbeit zwischen und mit den Kolleg*innen und weiß, welches Instrument in den verschiedenen Situationen anzuwenden ist.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Empathie-Fähigkeit',
            'question_description' => 'Eine empathische Führungskraft erkennt die Motivation hinter dem Handeln ihrer Mitarbeitenden und kann ihnen dementsprechend die richtigen Aufgaben zuweisen. Er/sie hört den Mitarbeiter*innen zu, wertschätzt sie und kann sich in ihre Probleme hineindenken.',
        ]);

        DB::table('questions')->insert([
            'question_text' => 'Gesunde Führung',
            'question_description' => 'Die Führungskraft kann delegieren, Entscheidungsprozesse auch partizipativ gestalten, Rahmenbedingungen gesund gestalten, Belastungen bei Mitarbeiter*innen erkennen und wenn möglich aus dem Weg räumen.',
        ]);
    }
}
