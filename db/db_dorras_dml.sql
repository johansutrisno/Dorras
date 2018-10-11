INSERT INTO dorras_role VALUES ('1', 'admin');
INSERT INTO dorras_role VALUES ('2', 'user');
INSERT INTO dorras_role VALUES ('3', 'komunitas');

INSERT INTO dorras_user (email, password, id_role) VALUES ('johansutrisno30@gmail.com', '1233', '1');

INSERT INTO dorras_event(location, nama_event, img_event, desc_event, start_event, end_event, lat_location, lon_location, state, score_event, id_user)
VALUES ('Pulau Derawan', 'Derawan Donor Darah', 'event1.jpg', 'Event ini dilaksanakan atas gagasan para pemuda di Pulau Derawan', '15-04-2017', '16-04-2017', '2,2248478', '118,1832189', '0', '100', '2');
INSERT INTO dorras_event(location, nama_event, img_event, desc_event, start_event, end_event, lat_location, lon_location, state, score_event, id_user)
VALUES ('Pulau Seribu', 'Seribu darah', 'event1.jpg', 'Seribu darah di pulau seribu', '20-04-2017', '21-04-2017', '-5,7985263', '106,4896885', '0', '100', '2');

INSERT INTO participant(id_user, id_event, status) VALUES ('2', '1', 'N');

INSERT INTO dorras_article (img_article, judul_article, isi_article, id_user) VALUES ('event1.jpg', 'Sehat itu penting', 'lorem ipsum dolor sit amet', '2');

INSERT INTO dorras_faq (nama, email, pertanyaan, id_user) VALUES ('udin', 'udin@m.com', 'kak?', '2');

INSERT INTO proposal (nama_event, proposal, status_proposal, id_user) VALUES ('Serentak Donor', 'serentakdonor.pdf', 'N', '2');