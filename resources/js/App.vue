<template>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="\app.css" rel="stylesheet">


    <title>Perspektivdialog</title>
  </head>

  <body class="d-flex flex-column h-100">
    <header class="mb-3 border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-between justify-content-between justify-content-lg-between">
          <div>
            <img src='/public/img/logo_swn.png' width='110px'>
          </div>
          <div class="p-4">
            <h1>Perspektivdialog</h1>
          </div>
          <div class="p-4">
            <button type="button" class="btn btn-swn">Sign-up</button>
          </div>
        </div>
      </div>
    </header>

    <div class="container-fluid flex-shrink-0">
      <div class="container">
        <h3 class="p-3"> Liebe Mitarbeiterinnen und Mitarbeiter,</h3>

        <p>Wir freuen uns, dass Sie an unserer Umfrage teilnehmen! Ihre Meinung und Ihre Erfahrungen sind uns äußerst
          wichtig,
          da sie uns dabei helfen, unser Unternehmen kontinuierlich zu verbessern und Ihnen ein besseres Arbeitsumfeld zu
          bieten. Ihre Teilnahme ist entscheidend, und wir schätzen Ihre Zeit und Mühe.</p>
        <p class="p-3">Herzlichen Dank und beste Grüße</p>
      </div>
      <div class="container">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button erste" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="bi-alarm" style="font-size: 2rem; color: cornflowerblue;"></i> Fach- und Medienkompetenzen
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">


                <div class="row">
                  <div class="col-2">
                    Arbeitsorganisation
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in gestaltet seine/ihre Arbeitsabläufe strukturiert und effizient. Merkmale einer
                    guten Arbeitsorganisation
                    sind z.B. die pünktliche Abgabe von Aufgaben, die richtige Prioritätensetzung und auch ein
                    aufgeräumter Arbeitsplatz.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio0" id="ao1" v-model="selectedOptionGroups[0]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="ao1">1</label>

                      <input type="radio" class="btn-check" name="btnradio0" id="ao2" v-model="selectedOptionGroups[0]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="ao2">2</label>

                      <input type="radio" class="btn-check" name="btnradio0" id="ao3" v-model="selectedOptionGroups[0]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="ao3">3</label>

                      <input type="radio" class="btn-check" name="btnradio0" id="ao4" v-model="selectedOptionGroups[0]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="ao4">4</label>

                      <input type="radio" class="btn-check" name="btnradio0" id="ao5" v-model="selectedOptionGroups[0]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="ao5">Nicht relevant</label>
                    </div>
                  </div>

                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[0]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Kundenorientierung
                  </div>
                  <div class="col-4">
                    Die Bedürfnisse der Kundschaft werden ernst genommen und berücksichtigt. Der/die Mitarbeiter*in ist
                    stets freundlich und kann Auskunft geben.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio1" id="ko1" v-model="selectedOptionGroups[1]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="ko1">1</label>

                      <input type="radio" class="btn-check" name="btnradio1" id="ko2" v-model="selectedOptionGroups[1]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="ko2">2</label>

                      <input type="radio" class="btn-check" name="btnradio1" id="ko3" v-model="selectedOptionGroups[1]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="ko3">3</label>

                      <input type="radio" class="btn-check" name="btnradio1" id="ko4" v-model="selectedOptionGroups[1]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="ko4">4</label>

                      <input type="radio" class="btn-check" name="btnradio1" id="ko5" v-model="selectedOptionGroups[1]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="ko5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[1]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Arbeitseffizienz
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in arbeitet dann effizient, wenn ein Ziel mit einem möglichst geringen Einsatz
                    oder mit einem bestimmten Einsatz
                    ein möglichst großer Ertrag erreicht wird. Er/sie setzt Prioritäten richtig und vermeidet u.a.
                    Multitasking, um fokussiert zu bleiben.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio2" id="ae1" v-model="selectedOptionGroups[2]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="ae1">1</label>

                      <input type="radio" class="btn-check" name="btnradio2" id="ae2" v-model="selectedOptionGroups[2]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="ae2">2</label>

                      <input type="radio" class="btn-check" name="btnradio2" id="ae3" v-model="selectedOptionGroups[2]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="ae3">3</label>

                      <input type="radio" class="btn-check" name="btnradio2" id="ae4" v-model="selectedOptionGroups[2]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="ae4">4</label>

                      <input type="radio" class="btn-check" name="btnradio2" id="ae5" v-model="selectedOptionGroups[2]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="ae5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[2]) }}
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-2">
                    Organisationsfähigkeit
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in kann methodisches Wissen mit Tatkraft und Engagement umsetzen. Er/sie weiß, wie
                    man Prioritäten setzt,
                    verschiedene Arbeitsaufgaben miteinander koordiniert und in eine sinnvolle Abfolge bringt.4
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio3" id="of1" v-model="selectedOptionGroups[3]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="of1">1</label>

                      <input type="radio" class="btn-check" name="btnradio3" id="of2" v-model="selectedOptionGroups[3]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="of2">2</label>

                      <input type="radio" class="btn-check" name="btnradio3" id="of3" v-model="selectedOptionGroups[3]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="of3">3</label>

                      <input type="radio" class="btn-check" name="btnradio3" id="of4" v-model="selectedOptionGroups[3]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="of4">4</label>

                      <input type="radio" class="btn-check" name="btnradio3" id="of5" v-model="selectedOptionGroups[3]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="of5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[3]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Arbeitssorgfalt
                  </div>
                  <div class="col-4">Der/die Mitarbeiter*in ist gründlich, zuverlässig und termintreu. Er/sie arbeitet
                    gewissenhaft,
                    zielgerichtet, aufmerksam und detailliert.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio4" id="as1" v-model="selectedOptionGroups[4]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="as1">1</label>

                      <input type="radio" class="btn-check" name="btnradio4" id="as2" v-model="selectedOptionGroups[4]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="as2">2</label>

                      <input type="radio" class="btn-check" name="btnradio4" id="as3" v-model="selectedOptionGroups[4]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="as3">3</label>

                      <input type="radio" class="btn-check" name="btnradio4" id="as4" v-model="selectedOptionGroups[4]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="as4">4</label>

                      <input type="radio" class="btn-check" name="btnradio4" id="as5" v-model="selectedOptionGroups[4]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="as5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[4]) }}
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-2">
                    Fachkompetenz
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in kann fachbezogenes und fachübergreifendes Wissen in der Praxis selbstständig
                    und eigenverantwortlich anwenden.
                    Er/sie kann das Wissen auch an andere weitergeben.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio5" id="fk1" v-model="selectedOptionGroups[5]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="fk1">1</label>

                      <input type="radio" class="btn-check" name="btnradio5" id="fk2" v-model="selectedOptionGroups[5]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="fk2">2</label>

                      <input type="radio" class="btn-check" name="btnradio5" id="fk3" v-model="selectedOptionGroups[5]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="fk3">3</label>

                      <input type="radio" class="btn-check" name="btnradio5" id="fk4" v-model="selectedOptionGroups[5]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="fk4">4</label>

                      <input type="radio" class="btn-check" name="btnradio5" id="fk5" v-model="selectedOptionGroups[5]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="fk5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[5]) }}
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-2">
                    Verhandlungskompetenz
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in definiert und kommuniziert das eigene Ziel, erkennt und berücksichtigt das
                    Interesse
                    des/der Verhandlungspartners/-partnerin. Er/sie kann Konflikte sachlich und konstruktiv lösen.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio6" id="vk1" v-model="selectedOptionGroups[6]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="vk1">1</label>

                      <input type="radio" class="btn-check" name="btnradio6" id="vk2" v-model="selectedOptionGroups[6]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="vk2">2</label>

                      <input type="radio" class="btn-check" name="btnradio6" id="vk3" v-model="selectedOptionGroups[6]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="vk3">3</label>

                      <input type="radio" class="btn-check" name="btnradio6" id="vk4" v-model="selectedOptionGroups[6]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="vk4">4</label>

                      <input type="radio" class="btn-check" name="btnradio6" id="vk5" v-model="selectedOptionGroups[6]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="vk5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[6]) }}
                  </div>
                </div>
                <hr>

              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed zweite" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Personale Kompetenzen
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-2">
                    Teamfähigkeit
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in zeigt Bereitschaft und Fähigkeit, in einer Gruppe zu arbeiten,
                    Meinungen und Gedanken anderer weiterzuentwickeln und sich auf Gruppenprozesse einzulassen.
                    Er/sie bringt seine Ideen in Gruppen mit ein und kann gemeinsam mit anderen die gesetzten Ziele
                    erreichen und Problemlösungen finden.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio7" id="tf1" v-model="selectedOptionGroups[7]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="tf1">1</label>

                      <input type="radio" class="btn-check" name="btnradio7" id="tf2" v-model="selectedOptionGroups[7]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="tf2">2</label>

                      <input type="radio" class="btn-check" name="btnradio7" id="tf3" v-model="selectedOptionGroups[7]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="tf3">3</label>

                      <input type="radio" class="btn-check" name="btnradio7" id="tf4" v-model="selectedOptionGroups[7]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="tf4">4</label>

                      <input type="radio" class="btn-check" name="btnradio7" id="tf5" v-model="selectedOptionGroups[7]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="tf5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[7]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Kommunikationsfähigkeit
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in kann anderen zuhören. Er/sie ist fähig, mündliche und schriftliche
                    Informationen mit hoher
                    Verständlichkeit zu gestalten und weiterzugeben. Bei Irritationen oder Meinungsverschiedenheiten kann
                    er/sie bewusst
                    innehalten und respektvoll reagieren.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio8" id="kf1" v-model="selectedOptionGroups[8]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="kf1">1</label>

                      <input type="radio" class="btn-check" name="btnradio8" id="kf2" v-model="selectedOptionGroups[8]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="kf2">2</label>

                      <input type="radio" class="btn-check" name="btnradio8" id="kf3" v-model="selectedOptionGroups[8]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="kf3">3</label>

                      <input type="radio" class="btn-check" name="btnradio8" id="kf4" v-model="selectedOptionGroups[8]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="kf4">4</label>

                      <input type="radio" class="btn-check" name="btnradio8" id="kf5" v-model="selectedOptionGroups[8]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="kf5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[8]) }}
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-2">
                    Zuverlässigkeit
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in steht zu den von ihm/ihr getroffenen Absprachen und erfüllt diese gewissenhaft
                    und pünktlich.
                    Andere können sich auf sein/ihr Wort verlassen.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio9" id="zf1" v-model="selectedOptionGroups[9]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="zf1">1</label>

                      <input type="radio" class="btn-check" name="btnradio9" id="zf2" v-model="selectedOptionGroups[9]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="zf2">2</label>

                      <input type="radio" class="btn-check" name="btnradio9" id="zf3" v-model="selectedOptionGroups[9]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="zf3">3</label>

                      <input type="radio" class="btn-check" name="btnradio9" id="zf4" v-model="selectedOptionGroups[9]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="zf4">4</label>

                      <input type="radio" class="btn-check" name="btnradio9" id="zf5" v-model="selectedOptionGroups[9]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="zf5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[9]) }}
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-2">
                    Kritikfähigkeit
                  </div>
                  <div class="col-4">
                    Sachlich formulierte und gerechtfertigte Kritik anzunehmen, ist für den/die Mitarbeiter*in kein
                    Problem.
                    Er/sie scheut sich nicht vor kritischen Gesprächen und hört währenddessen aufmerksam zu,
                    lernt aus seinen Fehlern und möchte seine Fähigkeiten verbessern. Er/sie kann sachliche Kritik äußern
                    und achtet darauf, niemanden zu verletzen.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio10" id="kfk1" v-model="selectedOptionGroups[10]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="kfk1">1</label>

                      <input type="radio" class="btn-check" name="btnradio10" id="kfk2" v-model="selectedOptionGroups[10]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="kfk2">2</label>

                      <input type="radio" class="btn-check" name="btnradio10" id="kfk3" v-model="selectedOptionGroups[10]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="kfk3">3</label>

                      <input type="radio" class="btn-check" name="btnradio10" id="kfk4" v-model="selectedOptionGroups[10]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="kfk4">4</label>

                      <input type="radio" class="btn-check" name="btnradio10" id="kfk5" v-model="selectedOptionGroups[10]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="kfk5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[10]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Konfliktfähigkeit
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in kann aufkommende Konflikte erkennen und versucht, diese vorab zu vermeiden oder
                    abzuschwächen.
                    Er/sie kann Konflikte ruhig und konstruktiv bewältigen, Lösungen oder Kompromisse finden und Argumente
                    nicht persönlich nehmen.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio11" id="kofk1"
                        v-model="selectedOptionGroups[11]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="kofk1">1</label>

                      <input type="radio" class="btn-check" name="btnradio11" id="kofk2"
                        v-model="selectedOptionGroups[11]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="kofk2">2</label>

                      <input type="radio" class="btn-check" name="btnradio11" id="kofk3"
                        v-model="selectedOptionGroups[11]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="kofk3">3</label>

                      <input type="radio" class="btn-check" name="btnradio11" id="kofk4"
                        v-model="selectedOptionGroups[11]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="kofk4">4</label>

                      <input type="radio" class="btn-check" name="btnradio11" id="kofk5"
                        v-model="selectedOptionGroups[11]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="kofk5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[11]) }}
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-2">
                    Fähigkeit zur Selbstreflexion
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in kann sich selbst ganzheitlich betrachten, inklusive aller Gedanken,
                    Emotionen und Handlungen. Er/sie analysiert und hinterfragt das eigene Handeln mit dem Ziel,
                    mehr über sich herauszufinden. Kritik wird als Chance zur Weiterentwicklung angesehen und nach
                    Rückmeldungen wird eigenständig gefragt.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio12" id="fzs1" v-model="selectedOptionGroups[12]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="fzs1">1</label>

                      <input type="radio" class="btn-check" name="btnradio12" id="fzs2" v-model="selectedOptionGroups[12]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="fzs2">2</label>

                      <input type="radio" class="btn-check" name="btnradio12" id="fzs3" v-model="selectedOptionGroups[12]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="fzs3">3</label>

                      <input type="radio" class="btn-check" name="btnradio12" id="fzs4" v-model="selectedOptionGroups[12]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="fzs4">4</label>

                      <input type="radio" class="btn-check" name="btnradio12" id="fzs5" v-model="selectedOptionGroups[12]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="fzs5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[12]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Verantwortungsbewusstsein
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in erfüllt seine Pflichten, weil ihm die Auswirkungen des eigenen Handels auf sich
                    selbst und auf andere bewusst ist.
                    Er/sie behält Termine, Deadlines und Aufgaben im Blick und kümmert sich eigenverantwortlich darum,
                    dass alles problemlos verläuft.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio13" id="vwb1" v-model="selectedOptionGroups[13]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="vwb1">1</label>

                      <input type="radio" class="btn-check" name="btnradio13" id="vwb2" v-model="selectedOptionGroups[13]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="vwb2">2</label>

                      <input type="radio" class="btn-check" name="btnradio13" id="vwb3" v-model="selectedOptionGroups[13]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="vwb3">3</label>

                      <input type="radio" class="btn-check" name="btnradio13" id="vwb4" v-model="selectedOptionGroups[13]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="vwb4">4</label>

                      <input type="radio" class="btn-check" name="btnradio13" id="vwb5" v-model="selectedOptionGroups[13]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="vwb5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[13]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Interkulturelle Kompetenz
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in kommt mit Menschen zurecht, die andere kulturelle Hintergründe haben.
                    Er/sie verhält sich respektvoll und hat Verständnis für die Bräuche und Sitten anderer Kulturen.
                    Er/sie achtet sowohl auf verbale als auch auf nonverbale Kommunikation und kann problemlos mit
                    Menschen anderer Kulturen arbeiten.</div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio14" id="ikk1" v-model="selectedOptionGroups[14]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="ikk1">1</label>

                      <input type="radio" class="btn-check" name="btnradio14" id="ikk2" v-model="selectedOptionGroups[14]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="ikk2">2</label>

                      <input type="radio" class="btn-check" name="btnradio14" id="ikk3" v-model="selectedOptionGroups[14]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="ikk3">3</label>

                      <input type="radio" class="btn-check" name="btnradio14" id="ikk4" v-model="selectedOptionGroups[14]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="ikk4">4</label>

                      <input type="radio" class="btn-check" name="btnradio14" id="ikk5" v-model="selectedOptionGroups[14]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="ikk5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[14]) }}
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-2">
                    Belastbarkeit
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in kann unter (schweren) seelischen, sozialen und körperlichen Anspannungen sowie
                    bei hoher Arbeitsbelastung
                    weitgehend Fehlreaktionen vermeiden und zielorientiert, kontrolliert und sachlich handeln. Der Stress
                    wird durch eine geeignete
                    Aktivität, wie z.B. Sport, abgebaut.</div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio15" id="bbk1" v-model="selectedOptionGroups[15]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="bbk1">1</label>

                      <input type="radio" class="btn-check" name="btnradio15" id="bbk2" v-model="selectedOptionGroups[15]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="bbk2">2</label>

                      <input type="radio" class="btn-check" name="btnradio15" id="bbk3" v-model="selectedOptionGroups[15]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="bbk3">3</label>

                      <input type="radio" class="btn-check" name="btnradio15" id="bbk4" v-model="selectedOptionGroups[15]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="bbk4">4</label>

                      <input type="radio" class="btn-check" name="btnradio15" id="bbk5" v-model="selectedOptionGroups[15]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="bbk5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[15]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Engagement-Bereitschaft
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in investiert ein angemessenes Maß an Energie, um gute Ergebnisse zu erzielen und
                    SWN voranzubringen.
                    Er/sie hilft Kolleg*innen, die Unterstützung brauchen. </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio16" id="ebs1" v-model="selectedOptionGroups[16]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="ebs1">1</label>

                      <input type="radio" class="btn-check" name="btnradio16" id="ebs2" v-model="selectedOptionGroups[16]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="ebs2">2</label>

                      <input type="radio" class="btn-check" name="btnradio16" id="ebs3" v-model="selectedOptionGroups[16]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="ebs3">3</label>

                      <input type="radio" class="btn-check" name="btnradio16" id="ebs4" v-model="selectedOptionGroups[16]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="ebs4">4</label>

                      <input type="radio" class="btn-check" name="btnradio16" id="ebs5" v-model="selectedOptionGroups[16]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="ebs5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[16]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Leistungsbereitschaft
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in ist motiviert, sein/ihr psychisches und physisches Leistungsvermögen
                    eigenständig einzubringen,
                    um erforderliche Aufgaben zu erledigen, sich neue Fähigkeiten anzueignen und angestrebte Ziele zu
                    erreichen.</div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio17" id="lbs1" v-model="selectedOptionGroups[17]"
                        autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="lbs1">1</label>

                      <input type="radio" class="btn-check" name="btnradio17" id="lbs2" v-model="selectedOptionGroups[17]"
                        autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="lbs2">2</label>

                      <input type="radio" class="btn-check" name="btnradio17" id="lbs3" v-model="selectedOptionGroups[17]"
                        autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="lbs3">3</label>

                      <input type="radio" class="btn-check" name="btnradio17" id="lbs4" v-model="selectedOptionGroups[17]"
                        autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="lbs4">4</label>

                      <input type="radio" class="btn-check" name="btnradio17" id="lbs5" v-model="selectedOptionGroups[17]"
                        autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="lbs5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[17]) }}
                  </div>
                </div>
                <hr>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed dritte" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Lernkompetenz
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-2">
                    Lernbereitschaft
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in ist bereit, fehlendes fachliches und methodisches Wissen,
                    tätigkeitsspezifische Qualifikationen und Erfahrungen durch entsprechende Weiterbildungsmaßnahmen zu
                    erwerben.
                    Er/sie ist Neuem gegenüber aufgeschlossen und lernt aus Misserfolgen und Erfolgen.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio18" id="lbst1"
                        v-model="selectedOptionGroups[18]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="lbst1">1</label>

                      <input type="radio" class="btn-check" name="btnradio18" id="lbst2"
                        v-model="selectedOptionGroups[18]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="lbst2">2</label>

                      <input type="radio" class="btn-check" name="btnradio18" id="lbst3"
                        v-model="selectedOptionGroups[18]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="lbst3">3</label>

                      <input type="radio" class="btn-check" name="btnradio18" id="lbst4"
                        v-model="selectedOptionGroups[18]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="lbst4">4</label>

                      <input type="radio" class="btn-check" name="btnradio18" id="lbst5"
                        v-model="selectedOptionGroups[18]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="lbst5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[18]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Innovations- und Veränderungskompetenz
                  </div>
                  <div class="col-4">
                    Der/die Mitarbeiter*in kann neue Ideen, innovative Ansätze und Verbesserungen wahrnehmen, äußern,
                    vorantreiben und diese dann in nutzbringende Prozesse, Produkte oder Dienstleistungen umsetzen.
                    Er/sie sieht Veränderungen als Chancen für die Zukunft.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio19" id="iufk1"
                        v-model="selectedOptionGroups[19]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="iufk1">1</label>

                      <input type="radio" class="btn-check" name="btnradio19" id="iufk2"
                        v-model="selectedOptionGroups[19]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="iufk2">2</label>

                      <input type="radio" class="btn-check" name="btnradio19" id="iufk3"
                        v-model="selectedOptionGroups[19]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="iufk3">3</label>

                      <input type="radio" class="btn-check" name="btnradio19" id="iufk4"
                        v-model="selectedOptionGroups[19]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="iufk4">4</label>

                      <input type="radio" class="btn-check" name="btnradio19" id="iufk5"
                        v-model="selectedOptionGroups[19]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="iufk5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[19]) }}
                  </div>
                </div>
                <hr>
              </div>
            </div>
          </div>


          <div class="accordion-item">
            <h2 class="accordion-header" id="headingVier">
              <button class="accordion-button collapsed vierte" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseVier" aria-expanded="true" aria-controls="collapseVier">
                Führungskompetenz
              </button>
            </h2>
            <div id="collapseVier" class="accordion-collapse collapse" aria-labelledby="headingVier"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-2">
                    Vorbildfunktion
                  </div>
                  <div class="col-4">
                    Die Führungskraft lebt das Leitbild und die Führungsprinzipien von SWN vor.
                    Er/sie entwickelt sich kontinuierlich weiter und kennt ihre eigenen Schwächen und Stärken und gesteht
                    Fehler ein.
                    Er/sie schafft angemessene Rahmenbedingungen und gibt den Mitarbeitenden ehrliches und direktes
                    Feedback,
                    verhält sich aber immer wertschätzend und motivierend.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio20" id="vbft1"
                        v-model="selectedOptionGroups[20]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="vbft1">1</label>

                      <input type="radio" class="btn-check" name="btnradio20" id="vbft2"
                        v-model="selectedOptionGroups[20]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="vbft2">2</label>

                      <input type="radio" class="btn-check" name="btnradio20" id="vbft3"
                        v-model="selectedOptionGroups[20]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="vbft3">3</label>

                      <input type="radio" class="btn-check" name="btnradio20" id="vbft4"
                        v-model="selectedOptionGroups[20]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="vbft4">4</label>

                      <input type="radio" class="btn-check" name="btnradio20" id="vbft5"
                        v-model="selectedOptionGroups[20]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="vbft5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[20]) }}
                  </div>
                </div>
                <hr>


                <div class="row">
                  <div class="col-2">
                    Richtig delegieren
                  </div>
                  <div class="col-4">
                    Die Führungskraft gibt Aufgaben und Verantwortung an Mitarbeiter*innen ab.
                    Er/sie kennt die Fähigkeiten der Mitarbeitenden und vertraut auf eine zuverlässige Bearbeitung der
                    Aufgaben durch andere.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio21" id="rgdg1"
                        v-model="selectedOptionGroups[21]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="rgdg1">1</label>

                      <input type="radio" class="btn-check" name="btnradio21" id="rgdg2"
                        v-model="selectedOptionGroups[21]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="rgdg2">2</label>

                      <input type="radio" class="btn-check" name="btnradio21" id="rgdg3"
                        v-model="selectedOptionGroups[21]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="rgdg3">3</label>

                      <input type="radio" class="btn-check" name="btnradio21" id="rgdg4"
                        v-model="selectedOptionGroups[21]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="rgdg4">4</label>

                      <input type="radio" class="btn-check" name="btnradio21" id="rgdg5"
                        v-model="selectedOptionGroups[21]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="rgdg5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[21]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Motivieren
                  </div>
                  <div class="col-4">
                    Eine Führungskraft kann die Mitarbeiter*innen auf verschiedene Weise motivieren.
                    Die Motivation kann durch Lob, Anerkennung, Feedback, Wertschätzung, transparente Kommunikation,
                    Ausbauen von Stärken, Stärken der emotionalen Bindung oder auch durch monetäre Leistungen erfolgen.
                    Er/sie begeistert außerdem andere von seinen/ihren Ideen.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio22" id="mtvr1"
                        v-model="selectedOptionGroups[22]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="mtvr1">1</label>

                      <input type="radio" class="btn-check" name="btnradio22" id="mtvr2"
                        v-model="selectedOptionGroups[22]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="mtvr2">2</label>

                      <input type="radio" class="btn-check" name="btnradio22" id="mtvr3"
                        v-model="selectedOptionGroups[22]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="mtvr3">3</label>

                      <input type="radio" class="btn-check" name="btnradio22" id="mtvr4"
                        v-model="selectedOptionGroups[22]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="mtvr4">4</label>

                      <input type="radio" class="btn-check" name="btnradio22" id="mtvr5"
                        v-model="selectedOptionGroups[22]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="mtvr5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[22]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Ziele besprechen
                  </div>
                  <div class="col-4">
                    Die Führungskraft bespricht kurz- und langfristige Ziele mit allen betroffenen Mitarbeitenden und
                    kommuniziert diese immer transparent.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio23" id="zlbp1"
                        v-model="selectedOptionGroups[23]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="zlbp1">1</label>

                      <input type="radio" class="btn-check" name="btnradio23" id="zlbp2"
                        v-model="selectedOptionGroups[23]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="zlbp2">2</label>

                      <input type="radio" class="btn-check" name="btnradio23" id="zlbp3"
                        v-model="selectedOptionGroups[23]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="zlbp3">3</label>

                      <input type="radio" class="btn-check" name="btnradio23" id="zlbp4"
                        v-model="selectedOptionGroups[23]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="zlbp4">4</label>

                      <input type="radio" class="btn-check" name="btnradio23" id="zlbp5"
                        v-model="selectedOptionGroups[23]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="zlbp5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[23]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Ergebnisorientiert
                  </div>
                  <div class="col-4">
                    Die Führungskraft arbeitet mit dem eigenen Wissen, Erfahrungen und fachlichen sowie methodischen
                    Fähigkeiten auf ein zu erzielendes,
                    vorgegebenes oder selbstgesetztes Ergebnis hin. Das Ziel ist anspruchsvoll, aber erreichbar und wird
                    nicht aus den Augen verloren.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio24" id="ebot1"
                        v-model="selectedOptionGroups[24]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="ebot1">1</label>

                      <input type="radio" class="btn-check" name="btnradio24" id="ebot2"
                        v-model="selectedOptionGroups[24]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="ebot2">2</label>

                      <input type="radio" class="btn-check" name="btnradio24" id="ebot3"
                        v-model="selectedOptionGroups[24]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="ebot3">3</label>

                      <input type="radio" class="btn-check" name="btnradio24" id="ebot4"
                        v-model="selectedOptionGroups[24]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="ebot4">4</label>

                      <input type="radio" class="btn-check" name="btnradio24" id="ebot5"
                        v-model="selectedOptionGroups[24]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="ebot5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[24]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Informationsfluss
                  </div>
                  <div class="col-4">
                    Die Führungskraft stellt den Informationsfluss von oben nach unten und andersherum und an den
                    einzelnen Schnittstellen sicher.
                    Das heißt, wichtige Informationen werden korrekt und zeitnah an den/die entsprechende*n Empfänger*in
                    weitergegeben.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio25" id="infl1"
                        v-model="selectedOptionGroups[25]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="infl1">1</label>

                      <input type="radio" class="btn-check" name="btnradio25" id="infl2"
                        v-model="selectedOptionGroups[25]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="infl2">2</label>

                      <input type="radio" class="btn-check" name="btnradio25" id="infl3"
                        v-model="selectedOptionGroups[25]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="infl3">3</label>

                      <input type="radio" class="btn-check" name="btnradio25" id="infl4"
                        v-model="selectedOptionGroups[25]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="infl4">4</label>

                      <input type="radio" class="btn-check" name="btnradio25" id="infl5"
                        v-model="selectedOptionGroups[25]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="infl5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[25]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Coach
                  </div>
                  <div class="col-4">
                    Eine Führungskraft ist dann ein Coach, wenn er/sie den Mitarbeitenden spezielle Methoden oder
                    Selbstkompetenzen vermittelt oder ihnen Rückmeldung zu Verhaltensweisen und zur Wirkung im
                    Arbeitsalltag gibt.
                    Er/sie unterstützt die Mitarbeitenden, gibt ihnen Feedback und versucht eine positive Fehlerkultur zu
                    schaffen.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio26" id="coach1"
                        v-model="selectedOptionGroups[26]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="coach1">1</label>

                      <input type="radio" class="btn-check" name="btnradio26" id="coach2"
                        v-model="selectedOptionGroups[26]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="coach2">2</label>

                      <input type="radio" class="btn-check" name="btnradio26" id="coach3"
                        v-model="selectedOptionGroups[26]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="coach3">3</label>

                      <input type="radio" class="btn-check" name="btnradio26" id="coach4"
                        v-model="selectedOptionGroups[26]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="coach4">4</label>

                      <input type="radio" class="btn-check" name="btnradio26" id="coach5"
                        v-model="selectedOptionGroups[26]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="coach5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[26]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Rahmenbedingungen schaffen
                  </div>
                  <div class="col-4">
                    Die Führungskraft hält seinen/ihren Mitarbeitenden den Rücken frei und ermöglicht das eigenständige
                    Arbeiten.
                    Wird ein/e Mitarbeiter*in z.B. durch etwas von der Arbeit abgehalten, so kümmert sich die
                    Führungskraft um bessere Bedingungen.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio27" id="rbsf1"
                        v-model="selectedOptionGroups[27]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="rbsf1">1</label>

                      <input type="radio" class="btn-check" name="btnradio27" id="rbsf2"
                        v-model="selectedOptionGroups[27]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="rbsf2">2</label>

                      <input type="radio" class="btn-check" name="btnradio27" id="rbsf3"
                        v-model="selectedOptionGroups[27]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="rbsf3">3</label>

                      <input type="radio" class="btn-check" name="btnradio27" id="rbsf4"
                        v-model="selectedOptionGroups[27]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="rbsf4">4</label>

                      <input type="radio" class="btn-check" name="btnradio27" id="rbsf5"
                        v-model="selectedOptionGroups[27]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="rbsf5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[27]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                    Vertrauen
                  </div>
                  <div class="col-4">
                    Vertrauen kann man auf unterschiedliche Weise gewinnen: die Führungskraft ist in allen Angelegenheiten
                    transparent
                    oder er/sie gibt den Mitarbeitenden Handlungsspielraum, verspricht nur das, was auch eingehalten
                    werden kann oder
                    zeigt Interesse an Mitmenschen und vertraut ihnen auch.
                  </div>
                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio28" id="vert1"
                        v-model="selectedOptionGroups[28]" autocomplete="off" value="1">
                      <label class="btn btn-outline-primary" for="vert1">1</label>

                      <input type="radio" class="btn-check" name="btnradio28" id="vert2"
                        v-model="selectedOptionGroups[28]" autocomplete="off" value="2">
                      <label class="btn btn-outline-primary" for="vert2">2</label>

                      <input type="radio" class="btn-check" name="btnradio28" id="vert3"
                        v-model="selectedOptionGroups[28]" autocomplete="off" value="3">
                      <label class="btn btn-outline-primary" for="vert3">3</label>

                      <input type="radio" class="btn-check" name="btnradio28" id="vert4"
                        v-model="selectedOptionGroups[28]" autocomplete="off" value="4">
                      <label class="btn btn-outline-primary" for="vert4">4</label>

                      <input type="radio" class="btn-check" name="btnradio28" id="vert5"
                        v-model="selectedOptionGroups[28]" autocomplete="off" value="5">
                      <label class="btn btn-outline-primary" for="vert5">Nicht relevant</label>
                    </div>
                  </div>
                  <div class="col-2">
                    Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[28]) }}
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-2">
                  Verbindlichkeit
                </div>
                <div class="col-4">
                  Die Führungskraft steht zu seinem/ihrem Wort. Er/sie verfolgt den Grundsatz „Sagen, was man tut und
                  tun, was man sagt“.
                  Für die Mitarbeitenden ist er/sie berechenbar.
                </div>
                <div class="col-4">
                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio29" id="verb1"
                      v-model="selectedOptionGroups[29]" autocomplete="off" value="1">
                    <label class="btn btn-outline-primary" for="verb1">1</label>

                    <input type="radio" class="btn-check" name="btnradio29" id="verb2"
                      v-model="selectedOptionGroups[29]" autocomplete="off" value="2">
                    <label class="btn btn-outline-primary" for="verb2">2</label>

                    <input type="radio" class="btn-check" name="btnradio29" id="verb3"
                      v-model="selectedOptionGroups[29]" autocomplete="off" value="3">
                    <label class="btn btn-outline-primary" for="verb3">3</label>

                    <input type="radio" class="btn-check" name="btnradio29" id="verb4"
                      v-model="selectedOptionGroups[29]" autocomplete="off" value="4">
                    <label class="btn btn-outline-primary" for="verb4">4</label>

                    <input type="radio" class="btn-check" name="btnradio29" id="verb5"
                      v-model="selectedOptionGroups[29]" autocomplete="off" value="5">
                    <label class="btn btn-outline-primary" for="verb5">Nicht relevant</label>
                  </div>
                </div>
                <div class="col-2">
                  Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[29]) }}
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-2">
                  Digitale/hybride Kompetenz
                </div>
                <div class="col-4">
                  Die Führungskraft verwendet verschiedene Tools (für Home-Office und Büro) für die Zusammenarbeit
                  zwischen und mit den Kolleg*innen und weiß, welches Instrument in den verschiedenen Situationen
                  anzuwenden ist.
                </div>
                <div class="col-4">
                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio30" id="dhkt1"
                      v-model="selectedOptionGroups[30]" autocomplete="off" value="1">
                    <label class="btn btn-outline-primary" for="dhkt1">1</label>

                    <input type="radio" class="btn-check" name="btnradio30" id="dhkt2"
                      v-model="selectedOptionGroups[30]" autocomplete="off" value="2">
                    <label class="btn btn-outline-primary" for="dhkt2">2</label>

                    <input type="radio" class="btn-check" name="btnradio30" id="dhkt3"
                      v-model="selectedOptionGroups[30]" autocomplete="off" value="3">
                    <label class="btn btn-outline-primary" for="dhkt3">3</label>

                    <input type="radio" class="btn-check" name="btnradio30" id="dhkt4"
                      v-model="selectedOptionGroups[30]" autocomplete="off" value="4">
                    <label class="btn btn-outline-primary" for="dhkt4">4</label>

                    <input type="radio" class="btn-check" name="btnradio30" id="dhkt5"
                      v-model="selectedOptionGroups[30]" autocomplete="off" value="5">
                    <label class="btn btn-outline-primary" for="dhkt5">Nicht relevant</label>
                  </div>
                </div>
                <div class="col-2">
                  Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[30]) }}
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-2">
                  Empathie-Fähigkeit
                </div>
                <div class="col-4">
                  Eine empathische Führungskraft erkennt die Motivation hinter dem Handeln ihrer Mitarbeitenden und
                  kann ihnen dementsprechend die richtigen Aufgaben zuweisen. Er/sie hört den Mitarbeiter*innen zu,
                  wertschätzt sie und kann sich in ihre Probleme hineindenken.
                </div>
                <div class="col-4">
                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio31" id="emfa1"
                      v-model="selectedOptionGroups[31]" autocomplete="off" value="1">
                    <label class="btn btn-outline-primary" for="emfa1">1</label>

                    <input type="radio" class="btn-check" name="btnradio31" id="emfa2"
                      v-model="selectedOptionGroups[31]" autocomplete="off" value="2">
                    <label class="btn btn-outline-primary" for="emfa2">2</label>

                    <input type="radio" class="btn-check" name="btnradio31" id="emfa3"
                      v-model="selectedOptionGroups[31]" autocomplete="off" value="3">
                    <label class="btn btn-outline-primary" for="emfa3">3</label>

                    <input type="radio" class="btn-check" name="btnradio31" id="emfa4"
                      v-model="selectedOptionGroups[31]" autocomplete="off" value="4">
                    <label class="btn btn-outline-primary" for="emfa4">4</label>

                    <input type="radio" class="btn-check" name="btnradio31" id="emfa5"
                      v-model="selectedOptionGroups[31]" autocomplete="off" value="5">
                    <label class="btn btn-outline-primary" for="emfa5">Nicht relevant</label>
                  </div>
                </div>
                <div class="col-2">
                  Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[31]) }}
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-2">
                  Gesunde Führung
                </div>
                <div class="col-4">
                  Die Führungskraft kann delegieren, Entscheidungsprozesse auch partizipativ gestalten,
                  Rahmenbedingungen gesund gestalten, Belastungen bei Mitarbeiter*innen erkennen und wenn möglich aus
                  dem Weg räumen.
                </div>
                <div class="col-4">
                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio32" id="gefu1"
                      v-model="selectedOptionGroups[32]" autocomplete="off" value="1">
                    <label class="btn btn-outline-primary" for="gefu1">1</label>

                    <input type="radio" class="btn-check" name="btnradio32" id="gefu2"
                      v-model="selectedOptionGroups[32]" autocomplete="off" value="2">
                    <label class="btn btn-outline-primary" for="gefu2">2</label>

                    <input type="radio" class="btn-check" name="btnradio32" id="gefu3"
                      v-model="selectedOptionGroups[32]" autocomplete="off" value="3">
                    <label class="btn btn-outline-primary" for="gefu3">3</label>

                    <input type="radio" class="btn-check" name="btnradio32" id="gefu4"
                      v-model="selectedOptionGroups[32]" autocomplete="off" value="4">
                    <label class="btn btn-outline-primary" for="gefu4">4</label>

                    <input type="radio" class="btn-check" name="btnradio32" id="gefu5"
                      v-model="selectedOptionGroups[32]" autocomplete="off" value="5">
                    <label class="btn btn-outline-primary" for="gefu5">Nicht relevant</label>

                  </div>
                </div>
                <div class="col-2">
                  Ausgewählt: {{ getSelectedOptionLabel(selectedOptionGroups[32]) }}
                </div>
              </div>
              <hr>
            </div>
          </div>
        </div>

      </div>
      <div class="d-grid gap-2 p-5 d-md-flex justify-content-md-end">
        <button class="btn btn-swn btn-lg" type="button" @click="checkSelection">Senden</button>
        <p v-if="showWarning" class="text-danger">Nicht alle Fragen sind beantwortet. Überprüfen Sie bitte Ihre
          Bewertung.</p>
        <p v-if="showOk" class="text-info">Danke. Sie haben alle Fragen beantwortet. </p>
      </div>

    </div>
  </div>




  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">PerspektivDialog designed by Elena</span>
    </div>
  </footer>

</body>

</html></template>


<script setup>





import { ref } from 'vue';

const showWarning = ref(false);
const showOk = ref(false);

// Array of variables for selectedOptionGroup
const selectedOptionGroups = ref(Array(33).fill('0'));

function getSelectedOptionLabel(optionValue) {
  switch (optionValue) {
    case '1':
      return '1';
    case '2':
      return '2';
    case '3':
      return '3';
    case '4':
      return '4';
    case '5':
      return 'Nicht relevant';
    default:
      return '';
  }
}
function checkSelection() {
  let hasUnselected = false;

  for (let i = 0; i < selectedOptionGroups.value.length; i++) {
    if (selectedOptionGroups.value[i] === '0') {
      showWarning.value = true;
      hasUnselected = true; // Setz die Variable, um zu signalisieren, dass eine nicht ausgewählte Option gefunden wurde
      break;
    }
  }

  if (!hasUnselected) {
    showWarning.value = false; // Setzt showWarning auf false, wenn keine nicht ausgewählten Elemente vorhanden sind
    showOk.value = true;
  }
}

</script>

