using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MuerteEnemigo : MonoBehaviour
{
    void Start()
    {
    }
    void Update()
    {

    }
    void Reducir()
    {
        transform.parent.localScale = new Vector2(1.253744f, 0.5916933f);
    }
    void MorirEnemigo()
    {

        Destroy(transform.parent.gameObject);
    }
    void OnTriggerEnter2D(Collider2D colision)
    {
        if (colision.tag == "personaje")
        {
            colision.gameObject.GetComponent<Rigidbody2D>().AddForce(new Vector2(0, 1000f));
            colision.gameObject.GetComponent<Animator>().SetInteger("Estado", 2);
            Invoke("Reducir", 0);
            Invoke("MorirEnemigo", 0.5f);
        }

    }
}
